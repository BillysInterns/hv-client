<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\HeightDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HeightType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\LengthValue;
use elevate\HVObjects\Generic\Display;

class HeightDataXMTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/Height.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\HeightDataXML';

        $time = new Time('10', '39', '12');
        $date = new Date('10', '12', '2013');
        $dateTime = new DateTime($date, $time);

        $display = new Display('m', '50');
        $value = new LengthValue('34', $display);

        $heightType = new HeightType($dateTime, $value);

        $common = new Common('Height Note', 'Height Source', 'height, hv');

        self::$testObject = new HeightDataXML($heightType, $common);

        parent::setUpBeforeClass();
    }
}
 