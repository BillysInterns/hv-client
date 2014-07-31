<?php
/**
 * Created by PhpStorm.
 * User: redcore
 * Date: 3/10/14
 * Time: 11:13 AM
 */

namespace elevate\test;

use elevate\HVCommunicator;
use elevate\HVObjects\MethodObjects\Get\Info;
use elevate\util\InfoHelper;
use elevate\util\HVClientHelper;


class HVCommunicatorTest extends BaseTest {

    public function testGetAuthenticationURL()
    {
        $config = null;
        $config['healthVault']['redirectToken'] = "12345";
        $additionalTargetQSParams = array ('test' => 'blah');
        $url = $this->connector->getAuthenticationURL($this->appId, "www.test.com", $config, $additionalTargetQSParams);
        $targetqs = urlencode("?appid=".$this->appId."&redirect=www.test.com?redirectToken=12345&isMRA=true");
        $this->assertEquals(
            'https://account.healthvault-ppe.com/redirect.aspx?target=AUTH&targetqs='.$targetqs . '&test=blah', $url
        );
    }

    public function testConnect()
    {
        $token = $this->connector->connect();
        $this->assertNotEmpty($token);
    }

    public function testSignature()
    {
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;

        $this->connector->connect();
        $simpleXMLObj = simplexml_load_string($this->connector->getRawRequest());

        $appServer = $simpleXMLObj->{'info'}->{'auth-info'}->credential->appserver;

        // Get the has of the content
        $dom->loadXML($appServer->content->asXML());
        $contentXML = $dom->saveXML($dom->documentElement);
        openssl_sign(
        // remove line breaks and spaces between elements, otherwise the signature check will fail
            $contentXML,
            $signature,
            $this->privateKey,
            OPENSSL_ALGO_SHA1);
        $expectedSig = trim(base64_encode($signature));
        $actualSig = (string) $appServer->sig;
        $this->assertEquals($expectedSig,$actualSig);
    }

    public function testRequestInfoHash()
    {
        $reqGroup = InfoHelper::getHVRequestGroupForBase64ThingName('Personal Image', 1);
        $info = new Info(array($reqGroup));
        $this->hv->connect();
        $xml = HVClientHelper::HVInfoAsXML($info);
        $response = $this->hv->callHealthVault($info, 'GetThings', 2);
        $this->assertNotNull($response);

        $request = $this->connector->getRawRequest();
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($xml);
        $infoHashXML = $dom->saveXML($dom->documentElement);
        $dom->loadXML($request);
        $request = $dom->saveXML($dom->documentElement);
        $expectedHash = trim(base64_encode(sha1($infoHashXML, TRUE)));

        // Get the has of the content
        $requestSXML = simplexml_load_string($request);
        $actualHash = (string) $requestSXML->{'header'}->{'info-hash'}->{'hash-data'};
        $this->assertEquals($expectedHash,$actualHash);

    }

    public function testRequestHMACHash()
    {
        $reqGroup = InfoHelper::getHVRequestGroupForBase64ThingName('Personal Image', 1);
        $info = new Info(array($reqGroup));
        $this->hv->connect();

        $response = $this->hv->callHealthVault($info, 'GetThings', 2);
        $this->assertNotNull($response);

        $request = $this->connector->getRawRequest();
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($request);
        $request = $dom->saveXML($dom->documentElement);
        // Get the has of the content
        $requestSXML = simplexml_load_string($request);
        $time =  (string) $requestSXML->{'header'}->{'msg-time'};
        $hashData =  (string) $requestSXML->{'header'}->{'info-hash'}->{'hash-data'};
        $requestHeaderXML = $requestSXML->{'header'}->asXML();
        $xml = '<header><method>GetThings</method><method-version>2</method-version><record-id>'.$this->recordId.
            '</record-id><auth-session><auth-token>'.$this->hv->getAuthToken().'</auth-token><offline-person-info><offline-person-id>'.
            $this->personId.'</offline-person-id></offline-person-info></auth-session><language>en</language><country>US</country><msg-time>'.
            $time.'</msg-time><msg-ttl>29100</msg-ttl><version>'.HVCommunicator::$version.'</version><info-hash><hash-data algName="SHA1">'.
            $hashData.'</hash-data></info-hash></header>';
       $this->assertEquals($xml,$requestHeaderXML);

        $expectedHash =  trim(base64_encode(hash_hmac('sha1', $xml, base64_decode($this->connector->getDigest()), TRUE)));
        $actualHash = (string) $requestSXML->{'auth'}->{'hmac-data'};
        $this->assertEquals($expectedHash,$actualHash);


    }


}
 