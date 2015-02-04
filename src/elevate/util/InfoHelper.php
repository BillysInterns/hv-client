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
use Mentis\BaseBundle\Services\DateTimeHelper;

/**
 * Class InfoHelper
 * @package elevate\util
 */
class InfoHelper {

    /**
     * TODO Make me return keys as numbers not IDs! See ResponseGroupParser
     *
     * @param array $ids
     * @param null  $groupName
     *
     * @return Info
     */
    static function getHvInfoForThingIds(array $ids, $groupName = null)
    {
        return new Info(array(self::getHVRequestGroupForIds($ids, $groupName)));
    }

    /**
     * @param      $thingName
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     *
     * @return Info
     */
    static function getHVInfoForThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        $group = self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath);
        $info = new Info(array($group));
        return $info;
    }

    /**
     * @param      $typeId
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     *
     * @return Info
     */
    static function getHVInfoForTypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null)
    {
        $group = self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath);
        $info = new Info(array($group));
        return $info;
    }

    /**
     * @param      $typeId
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     * @param null $startRangeDate
     * @param null $endRangeDate
     * @param null $updatedDateMin
     * @param null $updatedDateMax
     *
     * @return RequestGroup
     */
    static function getHVRequestGroupForTypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null, $startRangeDate = null, $endRangeDate = null, $updatedDateMin = null, $updatedDateMax = null)
    {
        $filter = new ThingFilterSpec($typeId, $xpath, $startRangeDate, $endRangeDate, null, $updatedDateMin, $updatedDateMax);
        $format = new ThingFormatSpec(array('core'));

        $group = new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
        return $group;
    }

    static function getHVRequestGroupForThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null, $startRangeDate = null, $endRangeDate = null, $updatedDateMin = null, $updatedDateMax = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        return self::getHVRequestGroupForTypeId($typeId, $maxItems, $groupName, $xpath, $startRangeDate, $endRangeDate, null, $updatedDateMin, $updatedDateMax);
    }

    /**
     * @param      $thingName
     * @param      $startDate
     * @param      $endDate
     * @param      $updatedDateMin
     * @param      $updatedDateMax
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     *
     * @return RequestGroup
     */
    static function getHVRequestGroupForThingBetweenDates($thingName, $startDate, $endDate, $maxItems = 1, $groupName = null, $xpath = null, $createdPersonId = NULL, $updatedDateMin = null, $updatedDateMax = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);

        $formattedStartDate = $formattedEndDate = null;
        $formattedUpdatedDateMin = $formattedUpdatedDateMax = null;

        if ( !empty($startDate) )
        {
            $formattedStartDate = DateTimeHelper::convertToGMT(date("c", strtotime($startDate)));
        }
        if ( !empty($endDate) )
        {
            $formattedEndDate = DateTimeHelper::convertToGMT(date("c", strtotime($endDate)));
        }
        if ( !empty($updatedDateMin) )
        {
            $formattedUpdatedDateMin = DateTimeHelper::convertToGMT(date("c", strtotime($updatedDateMin)));
        }
        if ( !empty($updatedDateMax) )
        {
            $formattedUpdatedDateMax = DateTimeHelper::convertToGMT(date("c", strtotime($updatedDateMax)));
        }

        $filter = new ThingFilterSpec($typeId, $xpath, $formattedStartDate, $formattedEndDate, $createdPersonId, $formattedUpdatedDateMin, $formattedUpdatedDateMax);
        $format = new ThingFormatSpec(array('core'));

        return new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
    }

    /**
     * @param array $ids
     * @param null  $groupName
     *
     * @return RequestGroup
     */
    static function getHVRequestGroupForIds(array $ids, $groupName = null)
    {
        $group = new RequestGroup();

        $format = new ThingFormatSpec(array('core'));
        $filter = new ThingFilterSpec();

        $group->setCurrentVersionOnly(false);
        $group->setFormat($format);
        $group->setFilter($filter);
        $group->setIds($ids);
        $group->setMax(count($ids));
        $group->setName($groupName);
        return $group;
    }

    /**
     * @param      $thingName
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     * @param null $startRangeDate
     * @param null $endRangeDate
     * @param null $updatedDateMin
     * @param null $updatedDateMax
     *
     * @return RequestGroup
     */
    static function getHVRequestGroupForBase64ThingName($thingName, $maxItems = 1, $groupName = null, $xpath = null, $startRangeDate = null, $endRangeDate = null, $updatedDateMin = null, $updatedDateMax = null)
    {
        $typeId = TypeTranslator::lookupTypeId($thingName);
        return self::getHVRequestGroupForBase64TypeId($typeId, $maxItems, $groupName, $xpath, $startRangeDate, $endRangeDate, $updatedDateMin, $updatedDateMax);
    }

    /**
     * @param      $typeId
     * @param int  $maxItems
     * @param null $groupName
     * @param null $xpath
     * @param null $startRangeDate
     * @param null $endRangeDate
     * @param null $updatedDateMin
     * @param null $updatedDateMax
     *
     * @return RequestGroup
     */
    static function getHVRequestGroupForBase64TypeId($typeId, $maxItems = 1, $groupName = null, $xpath = null, $startRangeDate = null, $endRangeDate = null, $updatedDateMin = null, $updatedDateMax = null)
    {
        $filter = new ThingFilterSpec($typeId, $xpath, $startRangeDate, $endRangeDate, null, $updatedDateMin, $updatedDateMax);
        $format = new ThingFormatSpec(array('otherdata'));

        $group = new RequestGroup($filter, $format, $maxItems, $maxItems, $groupName);
        return $group;
    }

}