<?php


namespace elevate\test\HVObjects\GenericTypes;


use elevate\HVObjects\GenericTypes\CodableValue;
use elevate\HVObjects\GenericTypes\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodableValueTest extends BaseObjectTest
{

    private $codedValue;

    private $codableValue;

    private $xmlString;

    public function setup()
    {
        parent::setUp();
        $this->codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $this->codableValue = new CodableValue('Code', array($this->codedValue));
        $this->xmlString = $this->serializer->serialize($this->codableValue, 'xml');
    }

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlString(
            '<?xml version="1.0" encoding="UTF-8"?>
            <result>
                <text><![CDATA[Code]]></text>
                <code>
                    <value><![CDATA[5]]></value>
                    <family><![CDATA[Test Suite]]></family>
                    <type><![CDATA[Value Test]]></type>
                    <version><![CDATA[Version 4]]></version>
                </code>
            </result>',
            $this->xmlString
        );
    }

    public function testDeserialize()
    {
        $codeableValue = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\GenericTypes\CodableValue', 'xml'
        );

        $this->assertEquals($this->codableValue, $codeableValue);
    }
}
 