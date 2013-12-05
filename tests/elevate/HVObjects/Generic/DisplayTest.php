<?php

/**
 * @author troussos
 */
namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Display;

class DisplayTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Display.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Display';

        self::$testObject = new Display('some unit', '50 kilos');

        parent::setUpBeforeClass();
    }

}