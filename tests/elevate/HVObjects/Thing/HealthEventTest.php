<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Generic\Display;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Thing\HealthEvent;
use elevate\HVObjects\Thing\DataXML\HealthEventDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HealthEventType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;

class HealthEventTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/HealthEvent.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\HealthEvent';

        $time = new Time('10', '43', '12');
        $date = new Date('7', '12', '2013');
        $dateTime = new Datetime($date, $time);

        $eventCode = new CodedValue('started to walk', '34', array('Code Family'), array('Version 4'));
        $event = new CodableValue('Started to Walk', array($eventCode));

        $categoryCode = new CodedValue('dev-codes', '45', array('dev family'), array('Version 1'));
        $category = new CodableValue('Developmental Codes', array($categoryCode));

        $healthEventType = new HealthEventType($dateTime, $event, $category);

        $common = new Common('Height Note 2', 'Height Source 45', 'tageone, height, another tag');

        $healthEventDataXML = new HealthEventDataXML($healthEventType, $common);

        self::$testObject = new HealthEvent($healthEventDataXML);

        parent::setUpBeforeClass();
    }
}
 