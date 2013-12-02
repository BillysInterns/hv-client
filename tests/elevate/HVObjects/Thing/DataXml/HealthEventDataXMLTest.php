<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\HealthEventDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HealthEventType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;

class HealthEventDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/HealthEvent.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\HealthEventDataXML';

        $time = new Time('10', '39', '12');
        $date = new Date('10', '12', '2013');
        $dateTime = new DateTime($date, $time);

        $eventCode = new CodedValue('started to walk', '34', array('Code Family'), array('Version 4'));
        $event = new CodableValue('Started to Walk', array($eventCode));

        $categoryCode = new CodedValue('dev-codes', '45', array('dev family'), array('Version 1'));
        $category = new CodableValue('Developmental Codes', array($categoryCode));

        $healthEventType = new HealthEventType($dateTime, $event, $category);

        $common = new Common('Health Note', 'Health Source', 'health, hv');

        self::$testObject = new HealthEventDataXML($healthEventType, $common);

        parent::setUpBeforeClass();
    }
}
 