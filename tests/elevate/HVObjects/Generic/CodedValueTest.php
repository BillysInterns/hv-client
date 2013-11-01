<?php


namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodedValueTest extends BaseObjectTest
{

    private $codedValue;

    public function setUp()
    {
        parent::setUp();
        $this->sampleXMLPath = __DIR__ . '/../SampleXML/Generic/CodedValue.xml';
        $this->codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $this->xmlString = $this->serializer->serialize($this->codedValue, 'xml');
    }

    public function testDeserialize()
    {
        $codedValue = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\CodedValue', 'xml'
        );

        $this->assertEquals($this->codedValue, $codedValue);
    }
}
 