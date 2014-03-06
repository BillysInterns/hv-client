<?php

/**
 * @author troussos
 */

namespace elevate;

use biologis\HV\HVRawConnector;

use elevate\HVObjects\MethodObjects\Get\Info;
use elevate\util\HVClientHelper;
use JMS\Serializer\SerializerBuilder;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use elevate\util\InfoHelper;
use SimpleXMLElement;
use elevate\TypeTranslator;


/**
 * Class HVClient
 * @package elevate
 */
class HVClient implements HVClientInterface, LoggerAwareInterface
{

    /**
     * @var string HV Application ID
     */
    private $appId;
    /**
     * @var array Array of extra HV configuration parameters
     */
    private $config;
    /**
     * @var \biologis\HV\HVRawConnector|null Instance of the HV Raw Connector
     */
    private $connector = NULL;
    /**
     * @var string Person Id for the HV Request being made
     */
    private $personId;
    /**
     * @var NullLogger|null Logger for HV Client
     */
    private $logger = NULL;
    /**
     * @var string URL to make HV calls against
     */
    private $healthVaultPlatform = 'https://platform.healthvault-ppe.com/platform/wildcat.ashx';
    /**
     * @var string URL to Authenticate the HV connection against
     */
    private $healthVaultAuthInstance = 'https://account.healthvault-ppe.com/redirect.aspx';
    /**
     * @var null|string HV Certificate Thumb Print
     */
    private $thumbPrint = NULL;
    /**
     * @var null|string HV Private Key for the Application
     */
    private $privateKey = NULL;
    /**
     * @var \JMS\Serializer\Serializer|null Serializer for working with the xml from HV
     */
    private $serializer = NULL;
    /**
     * @var null|string Authentication Token from Health Vault
     */
    private $authToken = NULL;

    /**
     * @var string Used to sign the HV calls.
     */
    private $digest = NULL;

    /**
     * Set the member variables to the passed HV credentials. Setup a Logger and create the serializer.
     *
     * @param string $thumbPrint HV Certificate Thumb Print
     * @param string $privateKey HV Private Key for the Application
     * @param string $appId      HV Application Id
     * @param null   $personId   HV Person Id for the current request
     * @param array  $config     Any extra HV parameters
     *
     * @return $this
     */
    public function __construct(
        $thumbPrint,
        $privateKey,
        $appId,
        $personId,
        $recordId
    )
    {
        $this->thumbPrint = $thumbPrint;
        $this->privateKey = $privateKey;
        $this->appId      = $appId;
        $this->personId   = $personId;
        $this->recordId   = $recordId;

        $builder          = new SerializerBuilder();
        $this->serializer = $builder->build();

        $this->logger = new NullLogger();
        return $this;
    }

    /**
     * @return $this
     */
    public function disconnect()
    {
        $this->config['healthVault'] = NULL;
        $this->connector             = NULL;
        $this->connection            = NULL;
        $this->setAuthToken(NULL);
        return $this;
    }

    /**
     * @param      $redirectUrl
     * @param null $target
     * @param null $additionalTargetQSParams
     *
     * @return string
     */
    public function getAuthenticationURL(
        $redirectUrl,
        $target = NULL,
        $additionalTargetQSParams = NULL
    )
    {
        return HVRawConnector::getAuthenticationURL(
            $this->appId,
            $redirectUrl,
            $this->config,
            $this->healthVaultAuthInstance,
            $target,
            $additionalTargetQSParams
        );
    }

    public function getPersonInfo()
    {
        $method  = 'GetPersonInfo';
        $version = 1;
        $response = $this->callHealthVault(NULL, $method, $version);
        return HVClientHelper::HVPersonFromXML($response);
    }

    public function callHealthVault($info, $method, $version)
    {
        $xml = HVClientHelper::HVInfoAsXML($info);

        // Remove XML line and pull out group from inside info tag
        $groupObjs = new SimpleXMLElement($xml);
        $newXML    = "";
        // Get groups
        $groupObjs->xpath("//group");
        foreach ($groupObjs as $groupObj)
        {
            $newXML .= $groupObj->asXML();
        }
        $newXML = str_replace('<xpath><![CDATA[', '<xpath>', $newXML);
        $newXML = str_replace(']]></xpath>', '</xpath>', $newXML);

        return $this->callHealthVaultWithXML($newXML, $method, $version);
    }

    public function callHealthVaultWithXML($xml, $method, $version)
    {

        // Connect if we aren't already connected.
        if (!$this->isConnected())
        {
            $this->connect();
        }

        if ($this->isConnected())
        {
            //make the request
            $start = microtime(true);
            $this->connector->makeRequest($method, $version, $xml, array('record-id' => $this->recordId), $this->personId);
            $end = microtime(true);
            $rawResponse = $this->connector->getRawResponse();
            $this->logger->debug("HV Call Time (sec): " . round($end-$start,1));
            return $rawResponse;
        }
        else
        {
            throw new HVClientNotConnectedException();
        }
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return !empty($this->connector);
    }

    /**
     * Make the initial connection to Health Vault and obtain the AuthToken for subsequent requests
     *
     * @return string The AuthToken for making requests to HV
     */
    public function connect()
    {
        //If there is no connector, generate one and set it's logger
        // authToken
        $authToken = $this->getAuthToken();
        $digest = $this->getDigest();

        $this->config['authToken'] = $authToken;
        $this->config['digest'] = $digest;

        if (!$this->connector)
        {
            $this->connector = new HVRawConnector(
                $this->appId,
                $this->thumbPrint,
                $this->privateKey,
                $this->config
            );
            $this->connector->setLogger($this->logger);
            $this->connector->setHealthVaultPlatform($this->healthVaultPlatform);

        }

        if (empty( $authToken ) )
        {
            //Configure connector
            $authToken = $this->connector->connect();
            $this->setAuthToken($authToken);
            $this->setDigest($this->connector->getDigest());
        }

        return $authToken;
    }

    //Put things for request group

    public function getThingsByName($thingName, $max = 20, $groupName = NULL)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        if (is_null($typeId))
        {
            throw HVClientThingNameNotFoundException();
        }
        else
        {
            return $this->getThingsByTypeId($typeId, $max, $groupName);
        }
    }

    public function getThingsByTypeId($typeId, $max = 20, $groupName = NULL)
    {
        $info    = InfoHelper::getHVInfoForTypeId($typeId, $max, $groupName);
        $method  = 'GetThings';
        $version = 3;
        return HVClientHelper::HVGroupsFromXML($this->callHealthVault($info, $method, $version));

    }

    public function putThings($info, $version = 2)
    {
        $method  = 'PutThings';
        $putThingsResponse = HVClientHelper::parsePutThingsResponse(
            $this->callHealthVault($info, $method, $version)
        );
        return $putThingsResponse;
    }


    // Default getters and setters below here....

    /**
     * @return string
     */
    public function getHealthVaultAuthInstance()
    {
        return $this->healthVaultAuthInstance;
    }

    /**
     * @param $healthVaultAuthInstance
     *
     * @return $this
     */
    public function setHealthVaultAuthInstance($healthVaultAuthInstance)
    {
        $this->healthVaultAuthInstance = $healthVaultAuthInstance;
        return $this;
    }

    /**
     * @return string
     */
    public function getHealthVaultPlatform()
    {
        return $this->healthVaultPlatform;
    }

    /**
     * @param $healthVaultPlatform
     *
     * @return $this
     */
    public function setHealthVaultPlatform($healthVaultPlatform)
    {
        $this->healthVaultPlatform = $healthVaultPlatform;
        return $this;
    }

    /**
     * @return null
     */
    public function getConnector()
    {
        return $this->connector;
    }

    /**
     * @param HVRawConnectorInterface $connector
     *
     * @return $this
     */
    public function setConnector(HVRawConnectorInterface $connector)
    {
        $this->connector = $connector;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOnlineMode()
    {
        return isset($this->config['wctoken']);
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param $appId
     *
     * @return $this
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param $config
     *
     * @return $this
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return null
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param $personId
     *
     * @return $this
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @param mixed $recordId
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * @return mixed
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @return null
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param $privateKey
     *
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * @return null
     */
    public function getThumbPrint()
    {
        return $this->thumbPrint;
    }

    /**
     * @param $thumbPrint
     *
     * @return $this
     */
    public function setThumbPrint($thumbPrint)
    {
        $this->thumbPrint = $thumbPrint;
        return $this;
    }

    public function getThings($thingNameOrTypeId, $recordId, $options = array())
    {
    }

    /**
     * @param null|string $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @return null|string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param string $digest
     */
    public function setDigest($digest)
    {
        $this->digest = $digest;
    }

    /**
     * @return string
     */
    public function getDigest()
    {
        return $this->digest;
    }

}

class HVClientException extends \Exception
{
}

class HVClientNotConnectedException extends \Exception
{
}

class HVClientThingNameNotFoundException extends \Exception
{
}