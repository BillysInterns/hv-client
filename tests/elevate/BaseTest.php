<?php

/**
 * @author troussos
 */

namespace elevate\test;

use biologis\HV\HVRawConnector;
use elevate\HVClient;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HVRawConnector $connector
     */
    protected $connector;
    /**
     * @var HVClient
     */
    protected $hv;
    protected $appId;
    protected $session;
    protected $personId;
    protected $recordId;
    protected $thumbPrint;
    protected $privateKey;
    protected $elementPath;
    protected $updateValue;

    /**
     * Ensure the ApplicationID, Thumbprint and Private key successfully loaded.
     * @covers elevate\HVClient::__construct
     */
    public function testSetUp()
    {
        $this->assertNotEmpty($this->appId, "Application ID is empty.");
        $this->assertNotEmpty($this->thumbPrint, "Thumbprint is empty.");
        $this->assertNotEmpty($this->privateKey, "Private key is empty");
    }

    /**
     * Base setup constructor for HV php Unit tests.
     *
     * @covers elevate\HVClient::__construct
     */
    protected function setUp()
    {
        $baseConfigPath = realpath("");
        if (file_exists($baseConfigPath . '/sample_keys/app.id'))
        {
            $this->appId = file_get_contents($baseConfigPath . '/sample_keys/app.id');
        }

        if (file_exists($baseConfigPath . '/sample_keys/app.fp'))
        {
            $this->thumbPrint = file_get_contents($baseConfigPath . '/sample_keys/app.fp');
        }

        if (file_exists($baseConfigPath . '/sample_keys/server.key'))
        {
            $this->privateKey = file_get_contents($baseConfigPath . '/sample_keys/server.key');
        }

        $this->session    = array();

        $this->personId   = 'fa295fdb-c334-4c8f-b332-ec62074df84e';
        $this->recordId   = '8813bcc7-4075-4f96-a8ea-8df6d184f3fa';
        if (!is_null($this->privateKey) && !is_null($this->appId) && !is_null($this->privateKey))
        {
            $this->hv = new HVClient($this->thumbPrint, $this->privateKey, $this->appId, $this->personId, $this->recordId);
        }
        $this->hv->connect();
    }
}
 