<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 7:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects;


use elevate\HVObjects\MethodObjects\ThingFilterSpec;
use elevate\test\HVObjects\BaseObjectTest;

class ThingFilterSpecTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/MethodObjects/ThingFilterSpec.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\ThingFilterSpec';
        self::$testObject = new ThingFilterSpec('92ba621e-66b3-4a01-bd73-74844aed4f5b');
        parent::setUpBeforeClass();
    }
}