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
        $xml = $this->setupRequestInfo($xml, $method, $methodVersion, $info);
        $xml = $this->setupAdditionalHeaders($xml,$additionalHeaders);
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
            $infoReplacement = '<info/>';
        }
        $tags = array('<method/>', '<method-version/>', ' <msg-time/>', '<version/>', '<info/>', '<hash-data algName="SHA1"/>',
            '<auth-token/>','<language>en</language>','<country>US</country>');

        $replacements = array('<method>'.$method.'</method>','<method-version>'.$methodVersion.'</method-version>',
            '<msg-time>'.gmdate("Y-m-d\TH:i:s").'</msg-time>', '<version>'.HVCommunicator::$version.'</version>',
            $infoReplacement,'<hash-data algName="SHA1">'.$this->hash($infoReplacement).'</hash-data>', '<auth-token>'.$this->authToken.'</auth-token>',
            '<language>en</language>','<country>US</country>');



        $xml = str_replace($tags,$replacements,$xml);
        $header = substr($xml,strpos($xml,'<header>'),strpos($xml,'</header>') - strpos($xml,'<header>') + 9);

        $xml = str_replace('<hmac-data algName="HMACSHA1"/>', '<hmac-data algName="HMACSHA1">'.$this->hmacSha1($header, base64_decode($this->digest)).
            '</hmac-data>',$xml);
        if($methodVersion == '2')
            $xml = $xml;
        return $xml;

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
                $newHeader .= '<' . $element . '>' . $text . '</' . $element . '>';
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
        // Grab an authToken from HV
        if (empty($this->authToken)) {
            $baseXML = file_get_contents(__DIR__ . '/XmlTemplates/CreateAuthenticatedSessionTokenTemplate.xml');
            $baseXML = str_replace('<app-id/>','<app-id>'.$this->appId.'</app-id>',$baseXML);

            $baseXML = str_replace('<hmac-alg algName="HMACSHA1"/>','<hmac-alg algName="HMACSHA1">'.$this->digest.'</hmac-alg>',$baseXML);
            //Gets the information that needs to be signed (This is the content between and including the <content>...</content> tags)
            $contentString = substr($baseXML,strpos($baseXML,'<content>'),strpos($baseXML,'</content>') - strpos($baseXML,'<content>') + 10);
            $xml = str_replace('<sig digestMethod="SHA1" sigMethod="RSA-SHA1"/>','<sig digestMethod="SHA1" sigMethod="RSA-SHA1" thumbprint="'.
                $this->thumbPrint.'">'.$this->sign($contentString).'</sig>',$baseXML);

            // throws HVCommunicatorAnonymousWcRequestException
            $this->anonymousWcRequest('CreateAuthenticatedSessionToken', '1', $xml);
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

    /** Holds all Microsoft Health Vault things and their associated ID.
     * @var $things
     * @see http://developer.healthvault.com/pages/types/types.aspx
     */
    public static $things = array(
        'Advance Directive' => '822a5e5a-14f1-4d06-b92f-8f3f1b05218f',
        'Aerobic Exercise Session' => '90dbf000-fc55-4b92-b4a1-da45c36ad8bb',
        'Aerobic Profile' => '7b2ea78c-4b78-4f75-a6a7-5396fe38b09a',
        'Allergic Episode' => 'd65ad514-c492-4b59-bd05-f3f6cb43ceb3',
        'Allergy' => '52bf9104-2c5e-4f1f-a66d-552ebcc53df7',
        'Application Data Reference' => '9ad2a94f-c6a4-4d78-8b50-75b65be0e250',
        'Application-Specific Information' => 'a5033c9d-08cf-4204-9bd3-cb412ce39fc0',
        'Appointment' => '4b18aeb6-5f01-444c-8c70-dbf13a2f510b',
        'Asthma Inhaler' => 'ff9ce191-2096-47d8-9300-5469a9883746',
        'Asthma Inhaler Usage' => '03efe378-976a-42f8-ae1e-507c497a8c6d',
        'Base Thing Type' => '3e730686-781f-4616-aa0d-817bba8eb141',
        'Basic Demographic Information' => 'bf516a61-5252-4c28-a979-27f45f62f78d',
        'Basic Demographic Information #(v2)' => '3b3e6b16-eb69-483c-8d7e-dfe116ae6092',
        'Blood Glucose Measurement' => '879e7c04-4e8a-4707-9ad3-b054df467ce4',
        'Blood Oxygen Saturation' => '3a54f95f-03d8-4f62-815f-f691fc94a500',
        'Blood Pressure Measurement' => 'ca3c57f4-f4c1-4e15-be67-0a3caf5414ed',
        'Body Composition' => '18adc276-5144-4e7e-bf6c-e56d8250adf8',
        'Body Dimension' => 'dd710b31-2b6f-45bd-9552-253562b9a7c1',
        'Calorie Guideline' => 'd3170d30-a41b-4bde-a116-87698c8a001a',
        'Cardiac Profile' => 'adaf49ad-8e10-49f8-9783-174819e97051',
        'Care Plan' => '415c95e0-0533-4d9c-ac73-91dc5031186c',
        'Cholesterol Measurement' => '796c186f-b874-471c-8468-3eeff73bf66e',
        'Cholesterol Measurement #(v2)' => '98f76958-e34f-459b-a760-83c1699add38',
        'Clinical Document Architecture (CDA)' => '1ed1cba6-9530-44a3-b7b5-e8219690ebcf',
        'Comment' => '9f4e0fcd-10d7-416d-855a-90514ce2016b',
        'Concern' => 'aea2e8f2-11dd-4a7d-ab43-1d58764ebc19',
        'Condition' => '7ea7a1f9-880b-4bd4-b593-f5660f20eda8',
        'Continuity of Care Document (CCD)' => '9c48a2b8-952c-4f5a-935d-f3292326bf54',
        'Continuity of Care Record (CCR)' => '1e1ccbfc-a55d-4d91-8940-fa2fbf73c195',
        'Contraindication' => '046d0ad7-6d7f-4bfd-afd4-4192ca2e913d',
        'Daily Dietary Intake' => '9c29c6b9-f40e-44ff-b24e-fba6f3074638',
        'Daily Medication Usage' => 'a9a76456-0357-493e-b840-598bbb9483fd',
        'Device' => 'ef9cf8d5-6c0b-4292-997f-4047240bc7be',
        'Diabetes Insulin Injection Use' => '184166be-8adb-4d9c-8162-c403040e31ad',
        'Diabetic Profile' => '80cf4080-ad3f-4bb5-a0b5-907c22f73017',
        'Dietary Intake' => '089646a6-7e25-4495-ad15-3e28d4c1a71d',
        'Discharge Summary' => '02ef57a2-a620-425a-8e92-a301542cca54',
        'Education - MyData File (Preview)' => '0aa6a4c7-cef5-46ea-970e-206c8402dccb',
        'Education - SIF Student Academic Record (Preview)' => 'c3353437-7a5e-46be-8e1a-f93dac872a68',
        'Education Document (Preview)' => '9df1163d-eae1-405e-8a66-8aaf19bd5fc7',
        'Emergency or Provider Contact' => '25c94a9f-9d3d-4576-96dc-6791178a8143',
        'Emotional State' => '4b7971d6-e427-427d-bf2c-2fbcf76606b3',
        'Encounter #(v2)' => '464083cc-13de-4f3e-a189-da8e47d5651b',
        'Encounter' => '3d4bdf01-1b3e-4afc-b41c-bd3e641a6da7',
        'Exercise' => '85a21ddb-db20-4c65-8d30-33c899ccf612',
        'Exercise Samples' => 'e1f92d7f-9699-4483-8223-8442874ec6d9',
        'Explanation of Benefits' => '356fbba9-e0c9-4f4f-b0d9-4594f2490d2f',
        'Family History #(v2)' => '22826e13-41e1-4ba3-8447-37dadd208fd8',
        'Family History #(v3)' => '4a04fcc8-19c1-4d59-a8c7-2031a03f21de',
        'Family History' => '6d39f894-f7ac-4fce-ac78-b22693bf96e6',
        'Family History Condition' => '6705549b-0e3d-474e-bfa7-8197ddd6786a',
        'Family History Person' => 'cc23422c-4fba-4a23-b52a-c01d6cd53fdf',
        'File' => 'bd0403c5-4ae2-4b0e-a8db-1888678e4528',
        'Genetic SNP Result' => '9d006053-116c-43cc-9554-e0cda43558cb',
        'Group Membership' => '66ac44c7-1d60-4e95-bb5b-d21490e91057',
        'Group Membership Activity' => 'e75fa095-31ed-4b30-b5f7-463963b5e734',
        'HbA1C Measurement' => '227f55fb-1001-4d4e-9f6a-8d893e07b451',
        'Health Assessment' => '58fd8ac4-6c47-41a3-94b2-478401f0e26c',
        'Health Event' => '1572af76-1653-4c39-9683-9f9ca6584ba3',
        'Health Goal' => 'dad8bb47-9ad0-4f09-a020-0ff051d1d0f7',
        'Health Journal Entry' => '21d75546-8717-4deb-8b17-a57f48917790',
        'Healthcare Proxy' => '7ea47715-cba4-47f0-99d2-eb0a9fb4a85c',
        'Heart Rate' => 'b81eb4a6-6eac-4292-ae93-3872d6870994',
        'Height Measurement' => '40750a6a-89b2-455c-bd8d-b420a4cb500b',
        'Immunization #(v2)' => 'cd3587b5-b6e1-4565-ab3b-1c3ad45eb04f',
        'Immunization' => '3d817dbe-af42-4a9d-a553-d1298b4d08fc',
        'Insulin Injection' => '3b3c053b-b1fe-4e11-9e22-d4b480de74e8',
        'Insurance Plan' => '9366440c-ec81-4b89-b231-308a4c4d70ed',
        'Lab Test Results' => 'f57746af-9631-49dc-944e-2c92bee0d1e9',
        'Lab Test Results #(v2)' => '5800eab5-a8c2-482a-a4d6-f1db25ae08c3',
        'Life Goal' => '609319bf-35cc-40a4-b9d7-1b329679baaa',
        'Link' => 'd4b48e6b-50fa-4ba8-ac73-7d64a68dc328',
        'Medical Annotation' => '7ab3e662-cc5b-4be2-bf38-78f8aad5b161',
        'Medical Image Study #(v2)' => 'cdfc0a9b-6d3b-4d16-afa8-02b86d621a8d',
        'Medical Image Study' => 'c75651c8-548e-449f-8942-9e6379b0b88a',
        'Medical Problem' => '5e2c027e-3417-4cfc-bd10-5a6f2e91ad23',
        'Medication #(v2)' => '30cafccc-047d-4288-94ef-643571f7919d',
        'Medication' => '5c5f1223-f63c-4464-870c-3e36ba471def',
        'Medication Fill' => '167ecf6b-bb54-43f9-a473-507b334907e0',
        'Message' => '72dc49e1-1486-4634-b651-ef560ed051e5',
        'Microbiology Lab Test Result' => 'b8fcb138-f8e6-436a-a15d-e3a2d6916094',
        'PAP Session' => '9085cad9-e866-4564-8a91-7ad8685d204d',
        'Password Protected Package' => 'c9287326-bb43-4194-858c-8b60768f000f',
        'Peak Flow Measurement #(v2)' => '5d8419af-90f0-4875-a370-0f881c18f6b3',
        'Personal Contact Information' => '162dd12d-9859-4a66-b75f-96760d67072b',
        'Personal Demographic Information' => '92ba621e-66b3-4a01-bd73-74844aed4f5b',
        'Personal Image' => 'a5294488-f865-4ce3-92fa-187cd3b58930',
        'Pregnancy' => '46d485cf-2b84-429d-9159-83152ba801f4',
        'Procedure #(v2)' => 'df4db479-a1ba-42a2-8714-2b083b88150f',
        'Procedure' => '0a5f9a43-dc88-4e9f-890f-1f9159b76e7b',
        'Question Answer' => '55d33791-58de-4cae-8c78-819e12ba5059',
        'Radiology Lab Result' => 'e4911bd3-61bf-4e10-ae78-9c574b888b8f',
        'Respiratory Profile' => '5fd15cb7-b717-4b1c-89e0-1dbcf7f815dd',
        'Sleep Related Activity' => '031f5706-7f1a-11db-ad56-7bd355d89593',
        'Sleep Session' => '11c52484-7f1a-11db-aeac-87d355d89593',
        'Spirometer Measurement' => '921588d1-27bf-423c-8e55-650d2fedb3e0',
        'Status' => 'd33a32b2-00de-43b8-9f2a-c4c7e9f580ec',
        'Vital Signs' => '73822612-c15f-4b49-9e65-6af369e55c65',
        'Weekly Aerobic Exercise Goal' => 'e4501363-fb95-4a11-bb60-da64e98048b5',
        'Weight Goal' => 'b7925180-d69e-48fa-ae1d-cb3748ca170e',
        'Weight Measurement' => '3d34d87e-7fc1-4153-800f-f56592cb0d17',
    );


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

