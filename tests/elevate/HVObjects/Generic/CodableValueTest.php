<?php


namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodableValueTest extends BaseObjectTest
{

    private $codedValue;

    private $codableValue;

    public function setup()
    {
        parent::setUp();
        $this->sampleXMLPath = __DIR__ . '/../SampleXML/Generic/CodableValue.xml';
        $this->codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $this->codableValue = new CodableValue('Code', array($this->codedValue));
        $this->xmlString = $this->serializer->serialize($this->codableValue, 'xml');
    }

    public function testDeserialize()
    {
        $codeableValue = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\CodableValue', 'xml'
        );

        $this->assertEquals($this->codableValue, $codeableValue);
    }
}
 