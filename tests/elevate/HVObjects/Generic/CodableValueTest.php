<?php
/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodableValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/CodableValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\CodableValue';
        $codedValue            = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        self::$testObject      = new CodableValue('Code', array($codedValue));
        parent::setUpBeforeClass();
    }
}