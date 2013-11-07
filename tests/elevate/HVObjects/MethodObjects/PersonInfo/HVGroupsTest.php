<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:56 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\HVGroup;
use elevate\HVObjects\MethodObjects\PersonInfo\HVGroups;

class HVGroupsTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/HVGroups.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\HVGroups';

        $group1 = new HVGroup("Billy's Interns", "1337", "billy@theintern.com");
        $group2 = new HVGroup("Fireflies", "NDI", "omg@everything.net");
        $group3 = new HVGroup("Faceless Men", "ASOIAF", "noone@bravos.org");
        $groups = array($group1, $group2, $group3);

        self::$testObject = new HVGroups($groups);
        parent::setUpBeforeClass();
    }
}