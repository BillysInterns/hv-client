<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:56 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\HVGroup;
use elevate\test\HVObjects\BaseObjectTest;

class HVGroupTest extends BaseObjectTest
{
    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/HVGroup.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\HVGroup';

        self::$testObject = new HVGroup("Billy's Interns", "1337", "billy@theintern.com");
        parent::setUpBeforeClass();
    }
}