<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\Condition;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\Type\ConditionType;
use elevate\HVObjects\Thing\DataXML\ConditionDataXML;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Common;

class ConditionTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/Condition.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\Condition';

        $nameCode = new CodedValue('154', 'Illness', array('Illness Issues'), array('Version 1'));
        $name = new CodableValue("Skin Failure", array($nameCode));

        $onsetTime = new Time('12', '30', '44');
        $onsetDate = new Date('2013', '11', '15');
        $onsetDateTime = new DateTime($onsetDate, $onsetTime);

        $statusCode = new CodedValue('75', 'success/failure', array('illness status'), array('Version 1'));
        $status = new CodableValue('Failed', array($statusCode));

        $stopTime = new Time('10', '23', '11');
        $stopDate = new Date('2013', '11', '16');
        $stopDateTime = new DateTime($stopDate, $stopTime);

        $stopReason = "Grew Back";

        $conditionType = new ConditionType($name, $onsetDateTime, $status, $stopDateTime, $stopReason);

        $common = new Common('Condition Note', 'Condtion Test', 'Some tags', 'Somethign Related');

        $conditionDataXML = new ConditionDataXML($conditionType, $common);

        self::$testObject = new Condition($conditionDataXML);

        parent::setUpBeforeClass();
    }
}