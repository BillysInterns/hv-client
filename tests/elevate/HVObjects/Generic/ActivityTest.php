<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:04 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Activity;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;

use elevate\test\HVObjects\BaseObjectTest;

class ActivityTest extends BaseObjectTest
{

    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Activity.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Activity';

        $date = new Date(1991, 2, 4);
        $time = new Time(4, 20, 28, 9);
        $dateTime = new DateTime($date, $time);

        self::$testObject = new Activity($dateTime, 10);

        parent::setUpBeforeClass();
    }

}