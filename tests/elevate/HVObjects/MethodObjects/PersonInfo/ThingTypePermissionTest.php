<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:59 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\Permissions;

class ThingTypePermissionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/ThingTypePermission.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission';

        $permissions = new Permissions(array("All"));

        self::$testObject = new ThingTypePermission(
            '52bf9104-2c5e-4f1f-a66d-552ebcc53df7',
            $permissions,
            $permissions
        );

        parent::setUpBeforeClass();
    }
}