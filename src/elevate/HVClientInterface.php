<?php


    namespace elevate;

    /**
     * Interface HVClientInterface
     * @package biologis\HV
     */
    interface HVClientInterface
    {

        public function connect();

        public function disconnect();

        public function getAuthenticationURL($redirectUrl);

        public function getPersonInfo();

        public function getThings($thingNameOrTypeId, $recordId, $options = array());

        public function putThings($things, $recordId);

        public function setHealthVaultAuthInstance($healthVaultAuthInstance);

        public function getHealthVaultAuthInstance();

        public function setHealthVaultPlatform($healthVaultPlatform);

        public function getHealthVaultPlatform();

        public function setConnector(HVRawConnectorInterface $connector);

    }
