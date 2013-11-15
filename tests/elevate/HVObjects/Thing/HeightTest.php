<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\HeightMeasurement;
use elevate\HVObjects\Thing\DataXML\HeightDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HeightType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\LengthValue;
use elevate\test\HVObjects\BaseObjectTest;

class HeightTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/HeightMeasurement.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\HeightMeasurement';

        $time = new Time('10', '43', '12');
        $date = new Date('7', '12', '2013');
        $dateTime = new Datetime($date, $time);

        $value = new LengthValue('45', '90');

        $heightType = new HeightType($dateTime, $value);

        $common = new Common('Height Note 2', 'Height Source 45', 'tageone, height, another tag');

        $heightDataXML = new HeightDataXML($heightType, $common);
        self::$testObject = new HeightMeasurement($heightDataXML);

        parent::setUpBeforeClass();
    }
}
 