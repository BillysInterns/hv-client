<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\BodyCompositionDataXML;
use elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\BodyCompositionValue;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Display;

class BodyCompositionDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/BodyComposition.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\BodyCompositionDataXML';

        $display = new Display('lbs.', '190');
        $massValue = new WeightValue('45', $display);
        $value = new BodyCompositionValue($massValue, '0.75');

        $measurementCode = new CodedValue('BF', 'BF Types', array('BF-Types'), array('Version 1'));
        $measurementName = new CodableValue('Body Fat', array($measurementCode));

        $date = new ApproxDate('2013', '5', '12');
        $time= new Time('12', '35', '12');
        $tzCode = new CodedValue('New York', 'America Time Zone', array('timezones'), array('Version 1'));
        $tz = new CodableValue('America\New York', array($tzCode));

        $structuredDate = new StructuredApproxDate($date, $time, $tz);
        $when = new ApproxDateTime($structuredDate, 'Date Descritption');

        $bcType = new BodyCompositionType($when, $measurementName, $value);

        $common = new Common('BC Note', 'BC Source', 'bc, hv');

        self::$testObject = new BodyCompositionDataXML($bcType, $common);

        parent::setUpBeforeClass();
    }
}
 