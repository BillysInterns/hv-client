<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodedValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        CodedValueTest::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/CodedValue.xml';
        CodedValueTest::$objectNamespace = 'elevate\HVObjects\Generic\CodedValue';
        CodedValueTest::$testObject      = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        parent::setUpBeforeClass();
    }

}
 