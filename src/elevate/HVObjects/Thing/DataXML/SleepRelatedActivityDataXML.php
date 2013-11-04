<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 1:31 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing\DataXML;


class SleepRelatedActivity extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\Type\SleepRelatedActivityType")
     * @Serialized("sleep-pm")
     */
    protected $sleepRelatedActivity;
}