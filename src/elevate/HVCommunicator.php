<?php

/**
 * @author ecompton
 */

namespace elevate;
use DOMDocument;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use SimpleXMLElement;

use elevate\Interfaces\HVCommunicatorInterface;

//Load the custom exceptions
use elevate\Exceptions\HVCommunicatorAuthenticationExpiredException;
use elevate\Exceptions\HVCommunicatorUserNotAuthenticatedException;
use elevate\Exceptions\HVCommunicatorGenericException;
use elevate\Exceptions\HVCommunicatorAccessDeniedException;

/**
 * Class HVCommunicator
 * Performs XML requests to HV and checks responses
 * @package elevate
 */
class HVCommunicator implements HVCommunicatorInterface, LoggerAwareInterface
{

    public static $version = 'HVCommunicator1.0';

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
    protected $rawResponse;
    private $SXMLResponse;
    private $responseCode;

    //Useful for testing and debugging
    private $rawRequest;
    private $requestParameters;

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
            $this->sharedSecret = $this->hashString(uniqid());
            $this->digest = $this->hmacSha1Content($this->sharedSecret, $this->sharedSecret);
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
            $simpleXMLObj->{'app-id'} = $this->appId;
            $appServer = $simpleXMLObj->credential->appserver;
            $appServer->content->{'shared-secret'}->{'hmac-alg'} = $this->digest;
            $appServer->content->{'app-id'} = $this->appId;

            // Get the has of the content
            $dom->loadXML($appServer->content->asXML());
            $contentXML = $dom->saveXML($dom->documentElement);

            $contentXMLSigned = $this->signRequest($contentXML);

            $appServer->sig['thumbprint'] = $this->thumbPrint;
            $appServer->sig = $contentXMLSigned;

            $dom->loadXML($simpleXMLObj->asXML());
            $newXML = $dom->saveXML($dom->documentElement);

            // throws HVCommunicatorAnonymousWcRequestException
            $this->anonymousWcRequest('CreateAuthenticatedSessionToken', '1', $newXML);
            //using DOMDocument, SXML has issues with HV's weird namespaceing
            $doc = new DOMDocument();
            $doc->loadXML($this->rawResponse);


            $this->authToken = $doc->getElementsByTagName('token')->item(0)->nodeValue;
        }

        return $this->authToken;
    }

    /**
     * @param $method String The HV XML method to use
     * @param $methodVersion String The version of the HV XML method to use
     * @param $info String The information to send
     * @param $additionalHeaders array Additional headers to add to the request
     * @param $personId String The HV person id to send with the request
     */
    public function makeRequest($method, $methodVersion, $info,  $additionalHeaders, $personId)
    {
        $xml = null;
        $online = $this->isOnlineRequest($personId);
        if($online)
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/AuthenticatedWcRequestTemplate.xml');
            $simpleXMLObj = simplexml_load_string($xml);
            $simpleXMLObj->{'header'}->{'auth-session'}->{'user-auth-token'} = $this->config['wctoken'];
            $xml = $simpleXMLObj->asXML();
        }
        else
        {
            $xml = file_get_contents(__DIR__ . '/XmlTemplates/OfflineRequestTemplate.xml');
            $simpleXMLObj = simplexml_load_string($xml);
            $simpleXMLObj->{'header'}->{'auth-session'}->{'offline-person-info'}->{'offline-person-id'} = $personId;
            $xml = $simpleXMLObj->asXML();
        }
        //Do this first, record-id generally needs to be tacked on
        $xml = $this->setupAdditionalHeaders($xml,$additionalHeaders);

        $xml = $this->setupRequestInfo($xml, $method, $methodVersion, $info);

        $this->makeHVRequest($xml);

    }

    /**
     * Convenience function for replacing the various xml tags with relevant information
     * @param $xml String The XML to be changed
     * @param $method String The HV method to use
     * @param $methodVersion String The version of the HV method
     * @param $info String Info to be added (if applicable)
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
        $simpleXMLObj->{'header'}->{'version'} = self::$version;
        $simpleXMLObj->{'header'}->{'language'} = 'en';
        $simpleXMLObj->{'header'}->{'country'} = 'US';
        $infoXMLObj = simplexml_load_string($infoReplacement);
        //Theses not present in AuthToken Request
        if($method !='CreateAuthenticatedSessionToken')
        {
            $simpleXMLObj->{'header'}->{'auth-session'}->{'auth-token'} = $this->authToken;
            $dom->loadXML($infoXMLObj->asXML());
            $infoHashXML = $dom->saveXML($dom->documentElement);
            $simpleXMLObj->{'header'}->{'info-hash'}->{'hash-data'} = $this->hashString($infoHashXML);
        }
        // Create new DOMElements from the two SimpleXMLElements
        $domRequest = dom_import_simplexml($simpleXMLObj);
        $domInfo  = dom_import_simplexml($infoXMLObj);

        // Import the <info> into the request
        $domInfo  = $domRequest->ownerDocument->importNode($domInfo, TRUE);

        // Append the <info> to request
        $domRequest->appendChild($domInfo);

        // Get the header XML
        $headerS = $simpleXMLObj->{'header'};
       $dom->loadXML($headerS->asXML());
       $headerXML = $dom->saveXML($dom->documentElement);

       $headerXMLHashed = $this->hmacSha1Content($headerXML, base64_decode($this->digest));
        //Not present in Auth token request
        if($method !='CreateAuthenticatedSessionToken')
        {
            $simpleXMLObj->{'auth'}->{'hmac-data'} = $headerXMLHashed;
        }
        $dom->loadXML($simpleXMLObj->asXML());
        $newXML = $dom->saveXML($dom->documentElement);

        return $newXML;

    }

    /**
     * Adds additional tags to the XML request
     * @param $xml String The XML to change
     * @param $additionalHeaders  array New tags to be added to the template if needed
     * @return mixed The newly altered XML
     */
    private function setupAdditionalHeaders($xml,$additionalHeaders)
    {
        $sxe = new SimpleXMLElement($xml);
        if (!empty($additionalHeaders)) {
            foreach ($additionalHeaders as $element => $text) {
                if($text != null){
                    $newHeader = "<" . $element . ">" . $text . "</" . $element . ">";

                    // New element to be inserted
                    $insert = new SimpleXMLElement($newHeader);
                    // Get the method-version element
                    $target = current($sxe->xpath('//method-version'));
                    // Insert the new element after the method-version element
                    $this->simplexml_insert_after($insert, $target);
                }
            }
        }
        return $sxe->asXML();
    }

    private function simplexml_insert_after(SimpleXMLElement $insert, SimpleXMLElement $target)
    {
        $target_dom = dom_import_simplexml($target);
        $insert_dom = $target_dom->ownerDocument->importNode(dom_import_simplexml($insert), true);
        if ($target_dom->nextSibling) {
            return $target_dom->parentNode->insertBefore($insert_dom, $target_dom->nextSibling);
        } else {
            return $target_dom->parentNode->appendChild($insert_dom);
        }
    }

    /**
     * Checks to see if the the person is online, if not checks to make sure they are at least authenticated
     * @param $personId
     * @throws HVCommunicatorUserNotAuthenticatedException
     * @return bool
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

        $this->makeHVRequest($newXML);
    }

    /**
     * Makes the actual request to HV and checks the response to see if request was succesful
     * @param $xml String The XML to send
     */
    private function makeHVRequest($xml)
    {

        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($xml);
        $formattedDOMXML = $dom->saveXML();


        $params = array(
            'http' => array(
                'method' => 'POST',
                // remove line breaks and spaces between elements, otherwise the signature check will fail
                'content' => $formattedDOMXML,
            ),
        );

        $this->logger->debug('New Request: ' . $params['http']['content']);
        $this->rawRequest = $params['http']['content'];

        $this->rawResponse = $this->performRequest();
        $this->processResponse();
    }

    /**
     * Makes a cURL request and returns the response
     * @return string The Raw XML response
     */
    private function performRequest()
    {
        $c = curl_init($this->healthVaultPlatform);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $this->rawRequest);
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

    /**
     * Processes the XML response and checks for errors
     * @throws HVCommunicatorAuthenticationExpiredException
     * @throws \Exception
     */
    private function processResponse()
    {
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
                case 11: //Access Denied (Bad Auth Token)
                    throw new HVCommunicatorAccessDeniedException($this->SXMLResponse->status->error->message, $this->responseCode);
                case 7: // The user authenticated session token has expired.
                case 65: // The authenticated session token has expired.
                    unset($this->config);
                    unset($this->authToken);
                    throw new HVCommunicatorAuthenticationExpiredException($this->SXMLResponse->status->error->message, $this->responseCode);
                default: // Handle all status's without a particular case
                    throw new HVCommunicatorGenericException($this->SXMLResponse->status->error->message,$this->responseCode);
            }
        }
    }

    /**
     * Setup the redirect URL for sending the user to authenticate the App with HealthVault
     *
     * @param string $appId                     - The HV App ID
     * @param string $redirect                  - the URL to redirect to
     * @param array $config                     - Important session variables
     * @param array  $additionalTargetQSParams  - Any additional parameters to append to the URL
     * @param string $healthVaultAuthInstance   - The current HV instance to use
     * @param string $target                    - The goal of the request
     *
     * @return string The URL to go to for authorization, including the urlencoded redirect URL
     */
    public static function getAuthenticationURL($appId, $redirect, $config,
                                                $additionalTargetQSParams = NULL,
                                                $healthVaultAuthInstance = 'https://account.healthvault-ppe.com/redirect.aspx',
                                                $target = 'AUTH')
    {

        if (empty($config['healthVault']['redirectToken']))
        {
            $config['healthVault']['redirectToken'] = md5(uniqid());
        }

        $redirectUrl = urlencode('?appid='.$appId.'&redirect='.$redirect.'&redirectToken='.$config['healthVault']['redirectToken']);

        // If the additional parameters are not in associative array then do nothing.
        if (is_array($additionalTargetQSParams))
        {
            foreach ($additionalTargetQSParams as $paramKey => $paramData)
            {
                $redirectUrl .=  urlencode('&' . $paramKey . '=' . $paramData);
            }
        }

        $url = $healthVaultAuthInstance.'?target='.$target.'&targetqs='.$redirectUrl;
        return $url;
    }

    /**
     * Invalidates the current session
     * @param $config array Session values
     */
    public static function invalidateSession(&$config)
    {
        unset($config);
    }

    public function clearAuthToken()
    {
        $this->authToken = NULL;
    }

    /**
     * Returns the raw xml response
     * @return mixed
     */
    public function getRawResponse(){
        return $this->rawResponse;
    }

    /**
     * Returns the SimpleXML representation of the response
     * @return mixed
     */
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


    /**
     * @return mixed
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /** Hash
     * @param $str
     * @return string
     */
    private function hashString($str)
    {

        $hash = trim(base64_encode(sha1($str, TRUE)));
        return $hash;
    }

    /** Hmac Sha 1
     * @param $str
     * @param $key
     * @return string
     */
    private function hmacSha1Content($str, $key)
    {

        $hmac =  trim(base64_encode(hash_hmac('sha1', $str, $key, TRUE)));
        return $hmac;
    }

    /**
     * Signs the appropriate XML information for HV to validate
     * @param $str The XML to sign
     * @return string The signed XML
     * @throws \Exception
     */
    protected function signRequest($str)
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
            $str,
            $signature,
            $privateKey,
            OPENSSL_ALGO_SHA1);
        $sig = trim(base64_encode($signature));
        return $sig;
    }

    /**
     * Gets the raw XML request sent
     * @return mixed
     */
    public function getRawRequest()
    {
        return $this->rawRequest;
    }


}

