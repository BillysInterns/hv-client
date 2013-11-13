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

    public function testConstruct()
    {
        if (!is_null($this->privateKey) && !is_null($this->appId) && !is_null($this->privateKey))
        {
            $this->hv = new HVClient($this->thumbPrint, $this->privateKey, $this->appId, $this->personId, $this->recordId);
        }
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

        if (file_exists($baseConfigPath . '/sample_keys/app.pem'))
        {
            $this->privateKey = file_get_contents($baseConfigPath . '/sample_keys/app.pem');
        }

        $this->session  = array();
        $this->personId = 'fe7e6e83-e8a1-433c-b72d-c52837eb1abd';
        $this->recordId = 'cc1949b6-ebf4-4918-8e1e-436ef8fd2a4c';

        if (!is_null($this->privateKey) && !is_null($this->appId) && !is_null($this->privateKey))
        {
            $this->hv = new HVClient($this->thumbPrint, $this->privateKey, $this->appId, $this->personId, $this->recordId);
        }
    }
}
 