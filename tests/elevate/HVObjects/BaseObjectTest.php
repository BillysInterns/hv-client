<?php


namespace elevate\test\HVObjects;

require_once('vendor/autoload.php');

class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected $serializer;

    protected function setUp()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    public function testSetup()
    {
        $this->assertNotNull($this->serializer);
    }
}