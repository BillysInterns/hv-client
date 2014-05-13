<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\WeightMeasurementDataXML;
use elevate\HVObjects\Thing\DataXML\Type\WeightMeasurementType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\Display;

class WeightMeasurementDataXMTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/WeightMeasurement.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\WeightMeasurementDataXML';

        $time = new Time('10', '39', '12');
        $date = new Date('10', '12', '2013');
        $dateTime = new DateTime($date, $time);

        $display = new Display('lbs.', '45');
        $value = new WeightValue('20', $display);

        $weightType = new WeightMeasurementType($dateTime, $value);

        $common = new Common('Weight Note', 'Weight Source', 'Weight, hv');

        self::$testObject = new WeightMeasurementDataXML($weightType, $common);

        parent::setUpBeforeClass();
    }
}
 