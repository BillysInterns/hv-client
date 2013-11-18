<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\WeightMeasurement;
use elevate\HVObjects\Thing\DataXML\WeightDataXML;
use elevate\HVObjects\Thing\DataXML\Type\WeightType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\WeightValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Display;

class WeightTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/WeightMeasurement.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\WeightMeasurement';

        $time = new Time('10', '43', '12');
        $date = new Date('7', '12', '2013');
        $dateTime = new Datetime($date, $time);

        $display = new Display('lbs.', '45');
        $value = new WeightValue('20', $display);

        $weightType = new WeightType($dateTime, $value);

        $common = new Common('Weight Note 2', 'Weight Source 45', 'tageone, weight, another tag');

        $weightDataXML = new WeightDataXML($weightType, $common);
        self::$testObject = new WeightMeasurement($weightDataXML);

        parent::setUpBeforeClass();
    }
}
 