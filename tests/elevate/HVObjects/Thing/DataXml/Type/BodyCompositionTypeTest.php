<?php
/** @author troussos * */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\BodyCompositionValue;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\Time;

class BodyCompositionTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/BodyComposition.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType';

        $date = new ApproxDate('2013', '3', '1');
        $time = new Time('9', '30', '12');
        $timeZoneCode = new CodedValue('12', 'timezone', array('timezone Family'), array('version 4'));
        $tz = new CodableValue('New York', array($timeZoneCode));
        $structuredApproxDate = new StructuredApproxDate($date, $time, $tz);
        $dateTime = new ApproxDateTime($structuredApproxDate, 'Last Week');

        $measurementNameCode = new CodedValue('12', 'measurementName', array('145'), array('Version 1'));
        $measurementName = new CodableValue('Fat Assessment', array($measurementNameCode));

        $weightValue = new WeightValue('56', '124');
        $value = new BodyCompositionValue($weightValue, '0.75');

        $mesaurementMethodCode = new CodedValue('12', 'Measurement Method', array('BC-MM'), array('Version 1'));
        $mesaurementMethod = new CodableValue('Calipers', array($mesaurementMethodCode));

        $siteCode = new CodedValue('134', 'Site', array('BC-Sites'), array('Version 1'));
        $site = new CodableValue('Back', array($siteCode));

        self::$testObject = new BodyCompositionType($dateTime, $measurementName, $value, $mesaurementMethod, $site);
        parent::setUpBeforeClass();
    }
}
 