<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ofields
 * Date: 11/8/13
 * Time: 12:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\util;


use elevate\HVObjects\MethodObjects\Get\Info;
use elevate\HVObjects\MethodObjects\PersonInfo\HVGroup;
use elevate\HVObjects\MethodObjects\Get\RequestGroup;
use elevate\HVObjects\MethodObjects\ThingFilterSpec;
use elevate\HVObjects\MethodObjects\ThingFormatSpec;
use elevate\TypeTranslator;

class InfoHelper {


    static function getHVInfoForThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        $group = self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath, $effectiveMinimumDate, $effectiveMaximumDate);
        $info = new Info(array($group));
        return $info;
    }

    static function getHVInfoForTypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $group = self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath, $effectiveMinimumDate, $effectiveMaximumDate);
        $info = new Info(array($group));
        return $info;
    }

    static function getHVRequestGroupForTypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $filter = new ThingFilterSpec($typeId, $xpath, $effectiveMinimumDate, $effectiveMaximumDate);
        $format = new ThingFormatSpec(array('core', 'audits'));

        $group = new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
        return $group;
    }

    static function getHVRequestGroupForThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        return self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath, $effectiveMinimumDate, $effectiveMaximumDate);
    }

    static function getHVRequestGroupForBase64ThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        return self::getHVRequestGroupForBase64TypeId($typeId, $maxItems, $groupName, $xpath, $effectiveMinimumDate , $effectiveMaximumDate );
    }

    static function getHVRequestGroupForBase64TypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $filter = new ThingFilterSpec($typeId, $xpath, $effectiveMinimumDate, $effectiveMaximumDate);
        $format = new ThingFormatSpec(array('otherdata'));

        $group = new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
        return $group;
    }

}