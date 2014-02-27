<?php

/**
 * @author ecompton
 */

namespace elevate;
use elevate\HVRawConnectorAuthenticationExpiredException;
use elevate\HVRawConnectorUserNotAuthenticatedException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class HVRaw Connector
 * Performs XML requests to HV and checks responses
 * @package elevate
 */
class HVRawConnector implements HVRawConnectorInterface, LoggerAwareInterface
{

    public static $version = 'HVRawConnector1.2.0';

    protected $healthVaultPlatform = 'https://platform.healthvault-ppe.com/platform/wildcat.ashx';
    protected $language = '';
    protected $country = '';
    protected $authenticatedWcRequest = null;

    // Passed in via the constructor
    private $appId;
    private $thumbPrint;
    private $privateKey;
    private $config; // array of additional parameters

    // Generated in the constructor
    private $sharedSecret;
    private $digest;

    // Saved responses from HealthVault
    private $rawResponse;
    private $SXMLResponse;
    private $responseCode;

    // Call setLogger to change this from the default NullLogger
    private $logger = NULL;

    // This gets set in the connect method.
    private $authToken;

    /**
     *
     * @param $appId The Healthvault Application ID
     * @param $thumbPrint Cert Thumbprint
     * @param $privateKey The private key used to sign the request
     * @param $config Important session variables
     */
    public function __construct($appId, $thumbPrint, $privateKey, $config)
    {
        $this->appId = $appId;
        $this->thumbPrint = $thumbPrint;
        $this->privateKey = $privateKey;
        $this->config = $config;
        $this->logger = new NullLogger();


        if (empty($this->config['digest'])) {
            $this->sharedSecret = $this->hash(uniqid());
            $this->digest = $this->hmacSha1($this->sharedSecret, $this->sharedSecret);
        }
        else
        {
            $this->digest = $this->config['digest'];
        }

        if (!empty($this->config['authToken'])) {
            $this->authToken = $this->config['authToken'];
        }

    }

    /**
     * Setups the redirect URL for sending the user to authenticate the App with HealthVault
     * @param $appId The HV App Id
     * @param $redirect The Url to redirect to
     * @param $config Important session variables
     * @param string $healthVaultAuthInstance The current HV instance to use
     * @param string $target The goal of the request
     * @return string The URL to go to for authorization, including the urlencoded redirect URL
     */
    public static function getAuthenticationURL($appId, $redirect, $config,
                                                $healthVaultAuthInstance = 'https://account.healthvault-ppe.com/redirect.aspx',
                                                $target = "AUTH")
    {

        $config['healthVault']['redirectToken'] = md5(uniqid());
        $redirectUrl = urlencode("?appid=".$appId."&redirect=".$redirect."?redirectToken=".$config['healthVault']['redirectToken']."&isMRA=true");
        $url = $healthVaultAuthInstance."?target=".$target."&targetqs=".$redirectUrl;

        return $url;
    }

    /**
     * @param $method The HV XML method to use
     * @param $methodVersion The version of the HV XML method to use
     * @param $info The information to send
     * @param $additionalHeaders Additional eaders to add to the request
     * @param $personId The HV person id to send with the request
     */
    public function makeRequest($method, $methodVersion, $info,  $additionalHeaders, $personId)
    {
        $xml = null;
        $online = $this->isOnlineRequest();
        if($online)
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/AuthenticatedWcRequestTemplate.xml');
            $xml = str_replace('<user-auth-token/>','<user-auth-token/>'.$this->config['wctoken'].'</user-auth-token>',$xml);
        }
        else
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/OfflineRequestTemplate.xml');
            $xml = str_replace('<offline-person-id/>','<offline-person-id>'.$personId.'</offline-person-id>',$xml);
        }
        $xml = $this->setupRequestInfo($xml, $method, $methodVersion, $info);
        $xml = $this->setupAdditionalHeaders($xml,$additionalHeaders);
        $this->makeWCRequest($xml);


    }

    /**
     * Convenience function for replacing the various xml tags with relevant information
     * @param $xml The XML to be changed
     * @param $method The HV method to use
     * @param $methodVersion The version of the HV method
     * @param $info Info to be added (if applicable)
     * @return mixed The newly filled in XML
     */
    private function setupRequestInfo($xml, $method, $methodVersion, $info)
    {
        $infoReplacement = null;
        if(!empty($info))
        {
            $infoReplacement =  $info;
        }
        else
        {
            $infoReplacement = '<info/>';
        }
        $tags = array('<method/>', '<method-version/>', ' <msg-time/>', '<version/>', '<info/>', '<hash-data algName="SHA1"/>',
            '<auth-token />','<language>en</language>','<country>US</country>');

        $replacements = array('<method>'.$method.'</method>','<method-version>'.$methodVersion.'</method-version>',
            '<msg-time>'.gmdate("Y-m-d\TH:i:s").'</msg-time>', '<version>'.HVRawConnector::$version.'</version>',
            $infoReplacement,$this->hash($infoReplacement), '<auth-token>'.$this->authToken.'</auth-token>',
            '<language>en</language>','<country>US</country>');

        return str_replace($tags,$replacements,$xml);

    }

    /**
     * Adds additional tags to the XML request
     * @param $xml The XML to change
     * @param $additionalHeaders  New tags to be added to the template if needed
     * @return mixed The newly altered XML
     */
    private function setupAdditionalHeaders($xml,$additionalHeaders)
    {
        $newHeader = '</method-version>';
        if (!empty($additionalHeaders)) {
            foreach ($additionalHeaders as $element => $text) {
                $newHeader .= '<' . $element . '>' . $text . '</' . $element . '>';
            }
        }
        return str_replace('</method-version>',$newHeader,$xml);
    }

    /**
     * Checks to see if the the person is online, if not checks to make sure they are at least authenticated
     * @return bool
     * @throws HVRawConnectorUserNotAuthenticatedException
     */
    private function isOnlineRequest()
    {
        //check to see if we have a token
        if (empty($this->config['wctoken'])) {
            // No token, is the user authenticated?
            if (empty($personId)) {
                throw new HVRawConnectorUserNotAuthenticatedException();
            }
            return false;
        } else {
            return true;
        }
    }

    /**
     * Makes the actual request to HV and checks the response to see if request was succesful
     * @param $xml The XML to send
     * @throws HVRawConnectorAuthenticationExpiredException
     * @throws \Exception
     */
    private function makeWCRequest($xml)
    {

        $postData = preg_replace('/>\s+</', '><', $xml);

        $params = array(
            'http' => array(
                'method' => 'POST',
                // remove line breaks and spaces between elements, otherwise the signature check will fail
                'content' => $postData,
            ),
        );

        $this->logger->debug('New Request: ' . $params['http']['content']);

        $this->rawResponse = @curl_get_file_contents($this->healthVaultPlatform, $postData);

        if (!$this->rawResponse) {
            $this->responseCode = -1;
            throw new \Exception('HealthVault Connection Failure', -1);
        }
        $this->logger->debug('New Response: ' . $this->rawResponse);

        $this->SXMLResponse = simplexml_load_string($this->rawResponse);

        $this->responseCode = (int)$this->SXMLResponse->status->code;

        if ($this->responseCode > 0) {
            switch ($this->responseCode)
            {
                case 7: // The user authenticated session token has expired.
                case 65: // The authenticated session token has expired.
                    HVRawConnector::invalidateSession($this->config);
                    throw new HVRawConnectorAuthenticationExpiredException($this->SXMLResponse->status->error->message, $this->responseCode);
                default: // Handle all status's without a particular case
                    throw new HVRawConnectorAuthenticationExpiredException($this->SXMLResponse->status->error->message,$this->responseCode);
            }
        }
    }

    /**
     * Connects to HV and receives the auth token to use
     * @return mixed The auth token after a successful connection
     */
    public function connect()
    {
        // Grab an authToken from HV
        if (empty($this->authToken)) {
            $baseXML = file_get_contents(__DIR__ . '/XmlTemplates/CreateAuthenticatedSessionTokenTemplate.xml');
            $baseXML = str_replace('<app-id/>','<app-id>'.$this->appId.'</app-id>',$baseXML);

            $baseXML = str_replace('<hmac-alg algName="HMACSHA1"/>','<hmac-alg algName="HMACSHA1">'.$this->digest.'</hmac-alg>',$baseXML);
            //Gets the information that needs to be signed (This is the content between and including the <content>...</content> tags)
            $contentString = substr($baseXML,strpos($baseXML,'<content>'),strpos($baseXML,'</content>') - strpos($baseXML,'<content>') + 10);
            $xml = str_replace('<sig digestMethod="SHA1" sigMethod="RSA-SHA1"/>','<sig digestMethod="SHA1" sigMethod="RSA-SHA1" thumbprint="'.
                $this->thumbPrint.'">'.$this->sign($contentString).'</sig>',$baseXML);

            // throws HVRawConnectorAnonymousWcRequestException
            $this->anonymousWcRequest('CreateAuthenticatedSessionToken', '1', $xml);
            $this->authToken = $this->SXMLResponse->token;
        }

        return $this->authToken;
    }

    /**
     * Setups the XML to make the WC Request using the anonymous template
     * @param $method HV method to use
     * @param string $methodVersion The version of the HV method to use
     * @param string $info The info to put in the request
     * @param array $additionalHeaders Any additional tags to add
     */
    public function anonymousWcRequest($method, $methodVersion = '1', $info = '', $additionalHeaders = array())
    {
        $header = $this->setupRequestInfo(file_get_contents(__DIR__ . '/XmlTemplates/AnonymousWcRequestTemplate.xml'), $method,
            $methodVersion, $info);
        $header = str_replace('<app-id/>','<app-id>'.$this->appId.'</app-id>',$header);


        $this->setupAdditionalHeaders($header, $additionalHeaders);

        $this->makeWCRequest($header);
    }

    /**
     * Invalidates the current session
     * @param $config Session values
     */
    public static function invalidateSession(&$config)
    {
        unset($config['healthVault']);
    }

    /**
     * Returns the raw xml response
     * @return mixed
     */
    public function getRawResponse(){
        return $this->rawResponse;
    }

    /**
     * Sets the logger to use
     * @param LoggerInterface $logger
     * @return null|void
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Sets the HV platform to use
     * @param $healthVaultPlatform
     */
    public function setHealthVaultPlatform($healthVaultPlatform)
    {
        $this->healthVaultPlatform = $healthVaultPlatform;
    }



    public function getDigest()
    {
        return $this->digest;
    }

    /** Hash
     * @param $str
     * @return string
     */
    private function hash($str)
    {
        return trim(base64_encode(sha1(preg_replace('/>\s+</', '><', $str), TRUE)));
    }

    /** Hmac Sha 1
     * @param $str
     * @param $key
     * @return string
     */
    private function hmacSha1($str, $key)
    {
        return trim(base64_encode(hash_hmac('sha1', preg_replace('/>\s+</', '><', $str), $key, TRUE)));
    }

    /**
     * Signs the appropriate XML information for HV to validate
     * @param $str The XML to sign
     * @return string The signed XML
     * @throws \Exception
     */
    protected function sign($str)
    {
        static $privateKey = NULL;

        if (is_null($privateKey)) {
            if (is_file($this->privateKey)) {
                if (is_readable($this->privateKey)) {
                    $privateKey = @file_get_contents($this->privateKey);
                } else {
                    throw new \Exception('Unable to read private key file.');
                }
            } else {
                $privateKey = $this->privateKey;
            }
        }

        // TODO check if $privateKey really is a key (format)


        openssl_sign(
        // remove line breaks and spaces between elements, otherwise the signature check will fail
            preg_replace('/>\s+</', '><', $str),
            $signature,
            $privateKey,
            OPENSSL_ALGO_SHA1);

        return trim(base64_encode($signature));
    }


}

//TODO: Remove me
function curl_get_file_contents($URL, $postData)
{
    $c = curl_init($URL);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $postData );
    curl_setopt($c, CURLOPT_VERBOSE, 1);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLINFO_HEADER_OUT, 1);

    $response = curl_exec($c);


    $header_size = curl_getinfo($c,CURLINFO_HEADER_SIZE);
    $result['header'] = substr($response, 0, $header_size);
    $result['body'] = substr( $response, $header_size );
    $result['http_code'] = curl_getinfo($c,CURLINFO_HTTP_CODE);


    $info = curl_getinfo($c);
    $headerSent = curl_getinfo($c, CURLINFO_HEADER_OUT);

    curl_close($c);

    return $result['body'];
}

