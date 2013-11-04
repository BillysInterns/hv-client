<?php


namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\LengthValue;
use elevate\test\HVObjects\BaseObjectTest;
class LengthValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath =  __DIR__ . '/../SampleXML/Generic/LengthValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\LengthValue';

        self::$testObject = new LengthValue('57', '114');

        parent::setUpBeforeClass();
    }
}
 