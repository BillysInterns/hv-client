<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:55 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\Culture;
use elevate\test\HVObjects\BaseObjectTest;

class CultureTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/Culture.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\Culture';
        self::$testObject = new Culture("English", "'merica");
        parent::setUpBeforeClass();
    }
}