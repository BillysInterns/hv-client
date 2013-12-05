<?php

/**
 * @author troussos
 */
namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\TypeId;

class TypeIdTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/TypeId.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\TypeId';

        self::$testObject = new TypeId('4783yf8fhurhu8f9ur3', 'h78frh873-f4u898f-fhj89hf94');

        parent::setUpBeforeClass();
    }

}