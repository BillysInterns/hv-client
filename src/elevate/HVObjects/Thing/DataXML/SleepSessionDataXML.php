<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing\DataXML;


class SleepSessionDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\Type\SleepSessionType")
     * @Serialized("sleep-pm")
     */
    protected $sleepRelatedActivity;

}