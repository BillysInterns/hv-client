<?php


namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodedValueTest extends BaseObjectTest
{

    private $codedValue;

    private $xmlString;

    public function setUp()
    {
        parent::setUp();
        $this->codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $this->xmlString = $this->serializer->serialize($this->codedValue, 'xml');
    }

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="UTF-8"?>
            <result>
            <value><![CDATA[5]]></value>
            <family><![CDATA[Test Suite]]></family>
            <type><![CDATA[Value Test]]></type>
            <version><![CDATA[Version 4]]></version>
            </result>',
            $this->xmlString
        );

    }

    public function testDeserialize()
    {
        $codedValue = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\CodedValue', 'xml'
        );

        $this->assertEquals($this->codedValue, $codedValue);
    }
}
 