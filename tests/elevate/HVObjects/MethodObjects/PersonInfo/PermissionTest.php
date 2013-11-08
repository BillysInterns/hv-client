<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:58 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\Permissions;

class PermissionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/Permission.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\Permissions';
        self::$testObject = new Permissions(array("All"));
        parent::setUpBeforeClass();
    }
}