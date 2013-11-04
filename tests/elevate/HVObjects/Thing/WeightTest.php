<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\Weight;
use elevate\HVObjects\Thing\DataXML\WeightDataXML;
use elevate\HVObjects\Thing\DataXML\Type\WeightType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\WeightValue;

use elevate\test\HVObjects\BaseObjectTest;
class WeightTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/Weight.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\Weight';

        $time = new Time('10', '43', '12');
        $date = new Date('7', '12', '2013');
        $dateTime = new Datetime($date, $time);

        $value = new WeightValue('45', '90');

        $weightType = new WeightType($dateTime, $value);

        $common = new Common('Weight Note 2', 'Weight Source 45', 'tageone, weight, another tag');

        $weightDataXML = new WeightDataXML($weightType, $common);
        self::$testObject = new Weight($weightDataXML);

        parent::setUpBeforeClass();
    }
}
 