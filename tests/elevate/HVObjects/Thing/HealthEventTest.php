<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDate;
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

        $date = new ApproxDate('2013', '8', '27');
        $time = new Time('12', '23', '45');
        $dateTime = new StructuredApproxDate($date, $time);
        $dateTimeApprox = new ApproxDateTime($dateTime);

        $eventCode = new CodedValue('started to walk', '34', array('Code Family'), array('Version 4'));
        $event = new CodableValue('Started to Walk', array($eventCode));

        $categoryCode = new CodedValue('dev-codes', '45', array('dev family'), array('Version 1'));
        $category = new CodableValue('Developmental Codes', array($categoryCode));

        $healthEventType = new HealthEventType($dateTimeApprox, $event, $category);

        $common = new Common('Health Note', 'Health Source', 'health, hv');

        $healthEventDataXML = new HealthEventDataXML($healthEventType, $common);

        self::$testObject = new HealthEvent($healthEventDataXML);

        parent::setUpBeforeClass();
    }
}
 