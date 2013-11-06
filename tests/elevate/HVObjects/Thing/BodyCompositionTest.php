<?php
/** @author troussos **/

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\DataXML\BodyCompositionDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\BodyComposition;
use elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\BodyCompositionValue;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;

class BodyCompositionTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/BodyComposition.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\BodyComposition';

        $massValue = new WeightValue('45', '190');
        $value = new BodyCompositionValue($massValue, '0.75');

        $measurementCode = new CodedValue('BF', 'BF Types', array('BF-Types'), array('Version 1'));
        $measurementName = new CodableValue('Body Fat', array($measurementCode));

        $date = new ApproxDate('2013', '5', '12');
        $time= new Time('12', '35', '12');
        $tzCode = new CodedValue('New York', 'America Time Zone', array('timezones'), array('Version 1'));
        $tz = new CodableValue('America\New York', array($tzCode));

        $structuredDate = new StructuredApproxDate($date, $time, $tz);
        $when = new ApproxDateTime($structuredDate, 'Date Descritption');

        $bodyCompositionType = new BodyCompositionType($when, $measurementName, $value);

        $common = new Common('BC Note', 'BC Source', 'bc, hv');

        $dataXML = new BodyCompositionDataXML($bodyCompositionType, $common);

        self::$testObject = new BodyComposition($dataXML);

        parent::setUpBeforeClass();
    }
}
 