<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ofields
 * Date: 11/8/13
 * Time: 12:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\util;


use elevate\HVObjects\MethodObjects\Info;
use elevate\HVObjects\MethodObjects\PersonInfo\HVGroup;
use elevate\HVObjects\MethodObjects\RequestGroup;
use elevate\HVObjects\MethodObjects\ThingFilterSpec;
use elevate\HVObjects\MethodObjects\ThingFormatSpec;

class InfoHelper {

    static function getHVInfoForTypeId($typeId, $maxItems = 1, $groupName = null)
    {
        $filter = new ThingFilterSpec($typeId);
        $format = new ThingFormatSpec('core');

        $group = new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
        $info = new Info(array($group));
        return $info;
    }

}