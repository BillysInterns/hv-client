<?php


namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\LengthValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Display;
class LengthValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath =  __DIR__ . '/../SampleXML/Generic/LengthValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\LengthValue';

        $display = new Display('lbs', '114');
        self::$testObject = new LengthValue('57', $display);

        parent::setUpBeforeClass();
    }
}
 