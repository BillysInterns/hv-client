<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:55 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermission;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\Permissions;
use elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission;

class EffectiveRecordPermissionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/EffectiveRecordPermission.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermission';

        $permissions = new Permissions(array("All"));
        $thingPermission = new ThingTypePermission(
            '52bf9104-2c5e-4f1f-a66d-552ebcc53df7',
            $permissions,
            $permissions
        );

        self::$testObject = new EffectiveRecordPermission(
            'cee3e0fc-03c6-40b4-9550-a151901b4a27',
            array($thingPermission, $thingPermission)
        );
        parent::setUpBeforeClass();
    }
}