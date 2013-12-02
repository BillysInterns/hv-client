<?php


namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\HealthEventType;

class HealthEventTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/HealthEvent.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\HealthEventType';

        $date = new Date('2013', '8', '27');
        $time = new Time('12', '23', '45');
        $dateTime = new DateTime($date, $time);

        $eventCode = new CodedValue('started to walk', '34', array('Code Family'), array('Version 4'));
        $event = new CodableValue('Started to Walk', array($eventCode));

        $categoryCode = new CodedValue('dev-codes', '45', array('dev family'), array('Version 1'));
        $category = new CodableValue('Developmental Codes', array($categoryCode));

        self::$testObject = new HealthEventType($dateTime, $event, $category);

        parent::setUpBeforeClass();
    }
}
 