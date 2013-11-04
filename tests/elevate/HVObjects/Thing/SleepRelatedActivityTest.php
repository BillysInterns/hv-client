<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 3:10 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Thing\SleepRelatedActivity;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Thing\DataXML\SleepRelatedActivityDataXml;
use elevate\HVObjects\Thing\DataXML\Type\SleepRelatedActivityType;
use elevate\HVObjects\Generic\Activity;
use elevate\HVObjects\Generic\Common;

class SleepRelatedActivityTest extends BaseObjectTest
{

    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Thing/SleepRelatedActivity.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\SleepRelatedActivity';

        // When
        $whenDate = new Date(2013, 6, 20);
        $whenTime = new Time(5, 16, 50, 23);
        $when = new DateTime($whenDate, $whenTime);

        $caffeine = new Time(5, 16, 50, 23);

        $alcohol = new Time(5, 16, 50, 23);

        // Nap
        $napDate = new Date(2013, 6, 20);
        $napTime = new Time(5, 16, 50, 23);
        $napWhen = new DateTime($napDate, $napTime);
        $nap= new Activity($napWhen, 10);

        // Exercise
        $exerciseDate = new Date(2013, 6, 20);
        $exerciseTime = new Time(5, 16, 50, 23);
        $exerciseWhen = new DateTime($exerciseDate, $exerciseTime);
        $exercise = new Activity($exerciseWhen, 10);

        $sleepRelatedActivityType = new SleepRelatedActivityType(
            $when, $caffeine, $alcohol, $nap, $exercise, 3
        );

        $common = new Common('Sleep Related Activity Note', 'Unit Test', 'Some tags', 'Somethign Related');

        $dataXml = new SleepRelatedActivityDataXML($sleepRelatedActivityType, $common);

        self::$testObject = new SleepRelatedActivity($dataXml);

        parent::setUpBeforeClass();
    }

}