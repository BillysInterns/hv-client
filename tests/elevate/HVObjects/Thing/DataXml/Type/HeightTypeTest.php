<?php


namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Thing\DataXML\Type\HeightType;
use elevate\HVObjects\Generic\LengthValue;
use elevate\test\HVObjects\BaseObjectTest;

class HeightTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/Height.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\HeightType';

        $date = new Date('2013', '8', '27');
        $time = new Time('12', '23', '45');
        $dateTime = new DateTime($date, $time);

        $length = new LengthValue('20', '50');

        self::$testObject = new HeightType($dateTime, $length);

        parent::setUpBeforeClass();
    }
}
 