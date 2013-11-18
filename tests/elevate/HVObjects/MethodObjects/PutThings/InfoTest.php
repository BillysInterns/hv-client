<?php
/** @author troussos **/

namespace elevate\test\HVObjects\MethodObjects\PutThings;

use elevate\HVObjects\MethodObjects\PutThings\Info;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\LengthValue;
use elevate\HVObjects\Thing\DataXML\Type\HeightType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\HeightDataXML;
use elevate\HVObjects\Thing\HeightMeasurement;
use elevate\HVObjects\Generic\Display;


class InfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PutThings/Info.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PutThings\Info';

        $time = new Time('10', '43', '12');
        $date = new Date('7', '12', '2013');
        $dateTime = new Datetime($date, $time);

        $display = new Display('m', '50');
        $value = new LengthValue('45', $display);

        $heightType = new HeightType($dateTime, $value);

        $common = new Common('Height Note 2', 'Height Source 45', 'tageone, height, another tag');

        $heightDataXML = new HeightDataXML($heightType, $common);
        $height= new HeightMeasurement($heightDataXML);

        $things = array($height);

        self::$testObject = new Info($things);
        parent::setUpBeforeClass();
    }
}
 