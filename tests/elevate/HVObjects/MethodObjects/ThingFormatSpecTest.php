<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 7:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects;


use elevate\HVObjects\MethodObjects\ThingFormatSpec;
use elevate\test\HVObjects\BaseObjectTest;

class ThingFormatSpecTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/MethodObjects/ThingFormatSpec.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\ThingFormatSpec';
        self::$testObject = new ThingFormatSpec('core');
        parent::setUpBeforeClass();
    }
}