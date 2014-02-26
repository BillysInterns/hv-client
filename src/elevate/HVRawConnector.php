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
 * Class HVClient
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

    public static function getAuthenticationURL($appId, $redirect, $config,
                                                $healthVaultAuthInstance = 'https://account.healthvault-ppe.com/redirect.aspx',
                                                $target = "AUTH")
    {

        $config['healthVault']['redirectToken'] = md5(uniqid());
        $redirectUrl = urlencode("?appid=".$appId."&redirect=".$redirect."?redirectToken=".$config['healthVault']['redirectToken']."&isMRA=true");
        $url = $healthVaultAuthInstance."?target=".$target."&targetqs=".$redirectUrl;

        return $url;
    }

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

    public static function invalidateSession(&$config)
    {
        unset($config['healthVault']);
    }

    public function getRawResponse(){
        return $this->rawResponse;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function setHealthVaultPlatform($healthVaultPlatform)
    {
        $this->healthVaultPlatform = $healthVaultPlatform;
    }

    public function connect()
    {
        // Grab an authToken from HV
        if (empty($this->authToken)) {
            $baseXML = file_get_contents(__DIR__ . '/XmlTemplates/CreateAuthenticatedSessionTokenTemplate.xml');
            $baseXML = str_replace('<app-id/>','<app-id>'.$this->appId.'</app-id>',$baseXML);

            $baseXML = str_replace('<hmac-alg algName="HMACSHA1"/>','<hmac-alg algName="HMACSHA1">'.$this->digest.'</hmac-alg>',$baseXML);
            $contentString = substr($baseXML,strpos($baseXML,'<content>'),strpos($baseXML,'</content>') - strpos($baseXML,'<content>') + 10);
            $xml = str_replace('<sig digestMethod="SHA1" sigMethod="RSA-SHA1"/>','<sig digestMethod="SHA1" sigMethod="RSA-SHA1" thumbprint="'.
                $this->thumbPrint.'">'.$this->sign($contentString).'</sig>',$baseXML);

            // throws HVRawConnectorAnonymousWcRequestException
            $this->anonymousWcRequest('CreateAuthenticatedSessionToken', '1', $xml);
            $this->authToken = $this->SXMLResponse->token;
        }

        return $this->authToken;
    }

    public function anonymousWcRequest($method, $methodVersion = '1', $info = '', $additionalHeaders = array())
    {
        $header = $this->setupRequestInfo(file_get_contents(__DIR__ . '/XmlTemplates/AnonymousWcRequestTemplate.xml'), $method,
            $methodVersion, $info);
        $header = str_replace('<app-id/>','<app-id>'.$this->appId.'</app-id>',$header);


        $this->setupAdditionalHeaders($header, $additionalHeaders);

        $this->makeWCRequest($header);
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

