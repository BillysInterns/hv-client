<?php


namespace elevate\test\HVObjects\GenericTypes;

use elevate\HVObjects\GenericTypes\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodedValueTest extends BaseObjectTest
{

    public function testSerialize()
    {
        $codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));

        $xmlAssessment = $this->serializer->serialize($codedValue, 'xml');

    }
}
 