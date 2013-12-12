<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Thing\DataXML\ConditionDataXML;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Thing\DataXML\Type\ConditionType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Common;

class ConditionDataXmlTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/Condition.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\ConditionDataXML';

        $nameCode = new CodedValue('154', 'Illness', array('Illness Issues'), array('Version 1'));
        $name = new CodableValue("Skin Failure", array($nameCode));

        $onsetTime = new Time('12', '30', '44');
        $onsetDate = new ApproxDate('2013', '11', '15');
        $structuredOnset = new StructuredApproxDate($onsetDate, $onsetTime);
        $onsetDateTime = new ApproxDateTime($structuredOnset, 'Onset Time Descriptiomn');

        $statusCode = new CodedValue('75', 'success/failure', array('illness status'), array('Version 1'));
        $status = new CodableValue('Failed', array($statusCode));

        $stopTime = new Time('10', '23', '11');
        $stopDate = new ApproxDate('2013', '11', '16');
        $structedStop = new StructuredApproxDate($stopDate, $stopTime);
        $stopDateTime = new ApproxDateTime($structedStop, 'Stop Time Description');

        $stopReason = "Grew Back";

        $conditionType = new ConditionType($name, $onsetDateTime, $status, $stopDateTime, $stopReason);


        $common = new Common('Condition Note', 'Condtion Test', 'Some tags');

        self::$testObject = new ConditionDataXML($conditionType, $common);
        parent::setUpBeforeClass();
    }
}
