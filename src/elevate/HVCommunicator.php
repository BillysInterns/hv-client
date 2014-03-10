<?php

/**
 * @author ecompton
 */

namespace elevate;
use DOMDocument;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class HVRaw Connector
 * Performs XML requests to HV and checks responses
 * @package elevate
 */
class HVCommunicator implements HVCommunicatorInterface, LoggerAwareInterface
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

    private $rawRequest;

    // Call setLogger to change this from the default NullLogger
    private $logger = NULL;

    // This gets set in the connect method.
    private $authToken;

    /**
     *
     * @param $appId String The Healthvault Application ID
     * @param $thumbPrint String The Cert Thumbprint
     * @param $privateKey String The private key used to sign the request
     * @param $config Array Important session variables
     */
    public function __construct($appId, $thumbPrint, $privateKey, $config)
    {
        $this->appId = $appId;
        $this->thumbPrint = $thumbPrint;
        $this->privateKey = $privateKey;
        $this->config = $config;
        $this->logger = new NullLogger();

     if($this->digest == null){
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

        if(empty($config['healthVault']['redirectToken']))
        {
            $config['healthVault']['redirectToken'] = md5(uniqid());
        }

        $redirectUrl = urlencode("?appid=".$appId."&redirect=".$redirect."?redirectToken=".$config['healthVault']['redirectToken']."&isMRA=true");
        $url = $healthVaultAuthInstance."?target=".$target."&targetqs=".$redirectUrl;

        return $url;
    }

    /**
     * @param $method The HV XML method to use
     * @param $methodVersion The version of the HV XML method to use
     * @param $info The information to send
     * @param $additionalHeaders array Additional headers to add to the request
     * @param $personId The HV person id to send with the request
     */
    public function makeRequest($method, $methodVersion, $info,  $additionalHeaders, $personId)
    {
        $xml = null;
        $online = $this->isOnlineRequest($personId);
        if($online)
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/AuthenticatedWcRequestTemplate.xml');
            $xml = str_replace('<user-auth-token/>','<user-auth-token>'.$this->config['wctoken'].'</user-auth-token>',$xml);
        }
        else
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/OfflineRequestTemplate.xml');
            $xml = str_replace('<offline-person-id/>','<offline-person-id>'.$personId.'</offline-person-id>',$xml);
        }
        $xml = $this->setupAdditionalHeaders($xml,$additionalHeaders);
        $xml = $this->setupRequestInfo($xml, $method, $methodVersion, $info);

        if($methodVersion == '2')
          $xml = $xml;
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
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        if(!empty($info))
        {
            $info = str_replace(array('<![CDATA[',']]>'),array('',''),$info);
            $infoReplacement =  $info;

            if(strpos($infoReplacement,'<info>') === false)
            {
                $infoReplacement =  '<info>'.$info.'</info>';

            }
        }
        else
        {
            $infoReplacement = '<info />';
        }
        $simpleXMLObj = simplexml_load_string($xml);

        // Set the attributes accordingly
        $simpleXMLObj->{'header'}->{'method'} = $method;
        $simpleXMLObj->{'header'}->{'method-version'} = $methodVersion;
        $simpleXMLObj->{'header'}->{'msg-time'} = gmdate("Y-m-d\TH:i:s");
        $simpleXMLObj->{'header'}->{'version'} = HVCommunicator::$version;
        $simpleXMLObj->{'header'}->{'language'} = 'en';
        $simpleXMLObj->{'header'}->{'country'} = 'US';
        $infoXMLObj = simplexml_load_string($infoReplacement);
        if($method !='CreateAuthenticatedSessionToken')
        {
            $simpleXMLObj->{'header'}->{'auth-session'}->{'auth-token'} = $this->authToken;

            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = false;
            $dom->loadXML($infoXMLObj->asXML());
            $infoHashXML = $dom->saveXML($dom->documentElement);
            $simpleXMLObj->{'header'}->{'info-hash'}->{'hash-data'} = $this->hash($infoHashXML);
        }
        // Create new DOMElements from the two SimpleXMLElements
        $domRequest = dom_import_simplexml($simpleXMLObj);
        $domInfo  = dom_import_simplexml($infoXMLObj);

        // Import the <info> into the request
        $domInfo  = $domRequest->ownerDocument->importNode($domInfo, TRUE);

        // Append the <info> to request
        $domRequest->appendChild($domInfo);

        // Get the has of the content
        $headerS = $simpleXMLObj->{'header'};
       $dom->loadXML($headerS->asXML());
       $headerXML = $dom->saveXML($dom->documentElement);

       $headerXMLHashed = $this->hmacSha1($headerXML, base64_decode($this->digest));

        $dom->loadXML($simpleXMLObj->asXML());
        $newXML = $dom->saveXML($dom->documentElement);


        $newXML = str_replace('<hmac-data algName="HMACSHA1"/>', '<hmac-data algName="HMACSHA1">'.$headerXMLHashed.'</hmac-data>',$newXML);
        return $newXML;

    }

    /**
     * Adds additional tags to the XML request
     * @param $xml The XML to change
     * @param $additionalHeaders  array New tags to be added to the template if needed
     * @return mixed The newly altered XML
     */
    private function setupAdditionalHeaders($xml,$additionalHeaders)
    {
        $newHeader = '</method-version>';
        if (!empty($additionalHeaders)) {
            foreach ($additionalHeaders as $element => $text) {
                $newHeader .= "<" . $element . ">" . $text . "</" . $element . ">";
            }
        }

        $xml = str_replace('</method-version>',$newHeader,$xml);
        return $xml;
    }

    /**
     * Checks to see if the the person is online, if not checks to make sure they are at least authenticated
     * @return bool
     * @throws HVCommunicatorUserNotAuthenticatedException
     */
    private function isOnlineRequest($personId)
    {
        //check to see if we have a token
        if (empty($this->config['wctoken'])) {
            // No token, is the user authenticated?
            if (empty($personId)) {
                throw new HVCommunicatorUserNotAuthenticatedException();
            }
            return false;
        } else {
            return true;
        }
    }

    /**
     * Makes the actual request to HV and checks the response to see if request was succesful
     * @param $xml The XML to send
     * @throws HVCommunicatorAuthenticationExpiredException
     * @throws \Exception
     */
    private function makeWCRequest($xml)
    {

        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($xml);
        $formattedDOMXML = $dom->saveXML();
        $formattedDOMXML = preg_replace("/[\n\r]/",'',$formattedDOMXML);

        $params = array(
            'http' => array(
                'method' => 'POST',
                // remove line breaks and spaces between elements, otherwise the signature check will fail
                'content' => $formattedDOMXML,
            ),
        );

        $this->logger->debug('New Request: ' . $params['http']['content']);
       // echo ' XML: ' . $xml;
        $this->rawRequest = $params['http']['content'];
        $this->rawResponse = @curl_get_file_contents($this->healthVaultPlatform, $params['http']['content']);

        if (!$this->rawResponse) {
            $this->responseCode = -1;
            throw new \Exception('HealthVault Connection Failure', -1);
        }
        $this->logger->debug('New Response: ' . $this->rawResponse);

        $this->SXMLResponse = simplexml_load_string($this->rawResponse);
        $xmlInfo = $this->SXMLResponse->children('urn:com.microsoft.wc.methods.response.CreateAuthenticatedSessionToken');

        $this->responseCode = (int)$this->SXMLResponse->status->code;

        if ($this->responseCode > 0) {
            switch ($this->responseCode)
            {
                case 7: // The user authenticated session token has expired.
                case 65: // The authenticated session token has expired.
                    HVCommunicator::invalidateSession($this->config);
                    throw new HVCommunicatorAuthenticationExpiredException($this->SXMLResponse->status->error->message, $this->responseCode);
                default: // Handle all status's without a particular case
                    throw new HVCommunicatorAuthenticationExpiredException($this->SXMLResponse->status->error->message,$this->responseCode);
            }
        }
    }

    /**
     * Connects to HV and receives the auth token to use
     * @return mixed The auth token after a successful connection
     */
    public function connect()
    {

        // Use this document to help remove whitespace.
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;

        // Grab an authToken from HV
        if (empty($this->authToken)) {
            $baseXML = file_get_contents(__DIR__ . '/XmlTemplates/CreateAuthenticatedSessionTokenTemplate.xml');

            $simpleXMLObj = simplexml_load_string($baseXML);

            // Set the attributes accordingly
            $simpleXMLObj->{'auth-info'}->{'app-id'} = $this->appId;
            $appServer = $simpleXMLObj->{'auth-info'}->credential->appserver;
            $appServer->content->{'shared-secret'}->{'hmac-alg'} = $this->digest;
            $appServer->content->{'app-id'} = $this->appId;

            // Get the has of the content
            $dom->loadXML($appServer->content->asXML());
            $contentXML = $dom->saveXML($dom->documentElement);

            $contentXMLSigned = $this->sign($contentXML);

            $appServer->sig['thumbprint'] = $this->thumbPrint;
            $appServer->sig = $contentXMLSigned;

            $dom->loadXML($simpleXMLObj->asXML());
            $newXML = $dom->saveXML($dom->documentElement);

            // throws HVCommunicatorAnonymousWcRequestException
            $this->anonymousWcRequest('CreateAuthenticatedSessionToken', '1', $newXML);
            $doc = new DOMDocument();
            $doc->loadXML($this->rawResponse);


            $this->authToken = $doc->getElementsByTagName('token')->item(0)->nodeValue;
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
        // Use this document to help remove whitespace.
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $baseXML = file_get_contents(__DIR__ . '/XmlTemplates/AnonymousWcRequestTemplate.xml');

        $simpleXMLObj = simplexml_load_string($baseXML);

        // Set the attributes accordingly
        $simpleXMLObj->{'header'}->{'app-id'} = $this->appId;


        $dom->loadXML($simpleXMLObj->asXML());
        $newXML = $dom->saveXML($dom->documentElement);
        $newXML = $this->setupAdditionalHeaders($newXML, $additionalHeaders);
        $newXML = $this->setupRequestInfo($newXML, $method, $methodVersion, $info);

        $newXML = $this->setupAdditionalHeaders($newXML, $additionalHeaders);

        $this->makeWCRequest($newXML);
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

    public function getSXMLResponse(){
        return $this->SXMLResponse;
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
        $hash = preg_replace('/>\s+</', '><', $str);
        $hash = preg_replace("/[\n\r]/",'',$hash);
        $hash = trim(base64_encode(sha1($hash, TRUE)));
        return $hash;
    }

    /** Hmac Sha 1
     * @param $str
     * @param $key
     * @return string
     */
    private function hmacSha1($str, $key)
    {
        $hmac = preg_replace('/>\s+</', '><', $str);
        $hmac = preg_replace("/[\n\r]/",'',$hmac);
        $hmac =  trim(base64_encode(hash_hmac('sha1', $hmac, $key, TRUE)));
        return $hmac;
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

        $toSign = preg_replace("/[\n\r]/",'',$str);
        $toSign = preg_replace('/>\s+</', '><', $toSign);
        openssl_sign(
        // remove line breaks and spaces between elements, otherwise the signature check will fail
            $toSign,
            $signature,
            $privateKey,
            OPENSSL_ALGO_SHA1);
        $sig = trim(base64_encode($signature));
        return $sig;
    }

    public function getRawRequest()
    {
        return $this->rawRequest;
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

