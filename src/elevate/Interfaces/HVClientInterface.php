<?php

/**
 * @author troussos
 */

namespace elevate\Interfaces;
use elevate\HVObjects\MethodObjects\PutThings\Info;
use elevate\Interfaces\HVCommunicatorInterface;

/**
 * Interface HVClientInterface
 * @package elevate
 */
interface HVClientInterface
{

    public function connect();

    public function disconnect();

    public function getAuthenticationURL($redirectUrl);

    public function getPersonInfo();

    public function getThings($thingNameOrTypeId, $recordId, $options = array());

    public function putThings($things);

    public function setHealthVaultAuthInstance($healthVaultAuthInstance);

    public function getHealthVaultAuthInstance();

    public function setHealthVaultPlatform($healthVaultPlatform);

    public function getHealthVaultPlatform();

    public function setConnector(HVCommunicatorInterface $connector);

}
