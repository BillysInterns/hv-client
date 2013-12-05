<?php

/**
 * @author troussos
 */
namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\ThingId;

class ThingIdTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/ThingId.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\ThingId';

        self::$testObject = new ThingId('4783yf8fhurhu8f9ur3', 'h78frh873-f4u898f-fhj89hf94');

        parent::setUpBeforeClass();
    }

}