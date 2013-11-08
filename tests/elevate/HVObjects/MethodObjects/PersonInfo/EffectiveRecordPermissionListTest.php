<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:56 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;


use elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermissionList;
use elevate\HVObjects\MethodObjects\PersonInfo\Permissions;
use elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission;
use elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermission;
use elevate\test\HVObjects\BaseObjectTest;

class EffectiveRecordPermissionListTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/EffectiveRecordPermissionList.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermissionList';

        $permissions = new Permissions(array("All"));
        $thingPermission = new ThingTypePermission(
            '52bf9104-2c5e-4f1f-a66d-552ebcc53df7',
            $permissions,
            $permissions
        );

        $effectiveRecord = new EffectiveRecordPermission(
            'cee3e0fc-03c6-40b4-9550-a151901b4a27',
            array($thingPermission, $thingPermission)
        );

        $effectiveRecord1 = new EffectiveRecordPermission(
            'cee3e0fc-03c6-40b4-9550-a151901b4a27',
            array($thingPermission, $thingPermission)
        );

        $list = array($effectiveRecord, $effectiveRecord1);

        self::$testObject = new EffectiveRecordPermissionList($list);
        parent::setUpBeforeClass();
    }
}