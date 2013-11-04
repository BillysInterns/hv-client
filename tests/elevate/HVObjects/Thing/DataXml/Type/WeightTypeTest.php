<?php


namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Thing\DataXML\Type\WeightType;
use elevate\HVObjects\Generic\WeightValue;
use elevate\test\HVObjects\BaseObjectTest;

class WeightTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/Weight.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\WeightType';

        $date = new Date('2013', '8', '27');
        $time = new Time('12', '23', '45');
        $dateTime = new DateTime($date, $time);

        $length = new WeightValue('20', '50');

        self::$testObject = new WeightType($dateTime, $length);

        parent::setUpBeforeClass();
    }
}
 