<?php


namespace elevate\test\HVObjects\GenericTypes;


use elevate\HVObjects\GenericTypes\CodableValue;
use elevate\HVObjects\GenericTypes\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodableValueTest extends BaseObjectTest
{

    public function testSerialize()
    {
        $codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));

        $codableValue = new CodableValue('Code', array($codedValue));

        $xmlAssessment = $this->serializer->serialize($codableValue, 'xml');

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
            $xmlAssessment
        );
    }
}
 