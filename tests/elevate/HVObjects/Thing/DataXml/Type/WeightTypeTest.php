<?php


namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Display;
use elevate\HVObjects\Thing\DataXML\Type\WeightMeasurementType;
use elevate\HVObjects\Generic\WeightValue;
use elevate\test\HVObjects\BaseObjectTest;

class WeightTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/WeightMeasurement.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\WeightType';

        $date = new Date('2013', '8', '27');
        $time = new Time('12', '23', '45');
        $dateTime = new DateTime($date, $time);

        $display = new Display('lbs.', '45');
        $value = new WeightValue('20', $display);

        self::$testObject = new WeightMeasurementType($dateTime, $value);

        parent::setUpBeforeClass();
    }
}
 