<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects;

abstract class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected $serializer;
    protected $sampleXMLPath;
    protected $xmlString;
    protected $testObject;
    protected $objectNamespace;

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlFile(
            $this->sampleXMLPath,
            $this->xmlString
        );
    }

    public function testDeserialize()
    {
        $object = $this->serializer->deserialize(
            $this->xmlString, $this->objectNamespace, 'xml'
        );

        $this->assertEquals($this->testObject, $object);
    }

    protected function setUp()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $this->xmlString  = $this->serializer->serialize($this->testObject, 'xml');
    }
}
