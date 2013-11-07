<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:57 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\Location;
use elevate\test\HVObjects\BaseObjectTest;

class LocationTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/Location.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\Location';
        self::$testObject = new Location('US', 'NJ');
        parent::setUpBeforeClass();
    }
}