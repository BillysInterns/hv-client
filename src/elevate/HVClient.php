<?php

/**
 * @author troussos
 */

namespace elevate;

use biologis\HV\HVRawConnector;

use elevate\util\HVClientHelper;
use JMS\Serializer\SerializerBuilder;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use elevate\util\InfoHelper;
use SimpleXMLElement;

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
    private $authToken =NULL;

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
     * Make the inital connection to Health Vault and obtain the AuthToken for subsequent requests
     *
     * @return string The AuthToken for making requests to HV
     */
    public function connect()
    {
        //If there is no connector, generate one and set it's logger
        if (!$this->connector)
        {
            $this->connector = new HVRawConnector(
                $this->appId,
                $this->thumbPrint,
                $this->privateKey,
                $this->config
            );
            $this->connector->setLogger($this->logger);
        }

        //Configure connector
        $this->connector->setHealthVaultPlatform($this->healthVaultPlatform);
        $this->authToken = $this->connector->connect();
        return $this->authToken;
    }

    /**
     * @return $this
     */
    public function disconnect()
    {
        $this->config['healthVault'] = NULL;
        $this->connector             = NULL;
        $this->connection            = NULL;
        return $this;
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return !empty($this->connector);
    }

    /**
     * @param      $redirectUrl
     * @param null $target
     * @param null $additionalTargetQSParams
     *
     * @return string
     */
    public function getAuthenticationURL($redirectUrl, $target = NULL, $additionalTargetQSParams = NULL)
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
        if ($this->connector)
        {
            $this->connector->makeRequest('GetPersonInfo', 1, '', NULL, $this->personId);

            $rawResponse = $this->connector->getRawResponse();

            return $rawResponse;

            //MAKE PERSON INFO OBJECT HERE
            /*
            if ($rawResponse)
            {
                return new PersonInfo(qp('<?xml version="1.0"?>' . $qpPersonInfo->xml(), NULL, array('use_parser' => 'xml')));
            }*/
        }
        else
        {
            throw new HVClientNotConnectedException();
        }
    }

    public function getThingsByName( $thingName )
    {


    }

    public function getThingsById( $typeId , $max = 20)
    {
        $info = InfoHelper::getHVInfoForTypeId($typeId, $max);
        $method = 'GetThings';
        return $this->callHealthVault( $info, $method );
    }

    public function getThingId( $typeId )
    {

    }

    public function putThings( $typeId, $max = 20 )
    {
        // ToDo $info = Thing XML
        $method = 'PutThings';
        return $this->callHealthVault( $info, $method );
    }

    public function callHealthVault($info, $method)
    {
        $xml = HVClientHelper::HVInfoAsXML($info);

        // Remove XML line and pull out group from inside info tag
        $xml = new SimpleXMLElement($xml);
        $xml = $xml->group->asXML();

        $xml = preg_replace( '/>\s+</', '><', $xml );
        return $this->callHealthVaultWithXML($xml, $method);
    }

    public function callHealthVaultWithXML( $xml, $method )
    {

        if($this->connector)
        {
            //make the request
            $this->connector->makeRequest( $method, $version = 1, $xml, array('record-id' => $this->recordId), $this->personId );
        }
        else
        {
            throw new HVClientNotConnectedException();
        }
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

    public function getThings($thingNameOrTypeId, $recordId, $options = array()) {}
}

class HVClientException extends \Exception
{
}

class HVClientNotConnectedException extends \Exception
{
}