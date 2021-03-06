<?php

/** author jonfor */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\FamilyHistoryRelative;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;

use elevate\HVObjects\Thing\DataXML\Type\FamilyHistory3Type;
use elevate\HVObjects\Thing\DataXML\Type\ConditionType;


class FamilyHistoryv3TypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/FamilyHistoryv3.xml";
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\FamilyHistoryv3Type';

        $nameCode = new CodedValue('154', 'Illness', array('Illness Issues'), array('Version 1'));
        $name = new CodableValue('Skin Failure', array($nameCode));

        $onsetTime = new Time('12', '30', '44');
        $onsetDate = new ApproxDate('2013', '11', '15');
        $structuredOnset = new StructuredApproxDate($onsetDate, $onsetTime);
        $onsetDateTime = new ApproxDateTime($structuredOnset, 'Onset Time Description');

        $statusCode = new CodedValue('75', 'success/failure', array('illness status'), array('Version 1'));
        $status = new CodableValue('Failed', array($statusCode));

        $stopTime = new Time('10', '23', '11');
        $stopDate = new ApproxDate('2013', '11', '16');
        $structuredStop = new StructuredApproxDate($stopDate, $stopTime);
        $stopDateTime = new ApproxDateTime($structuredStop, 'Stop Time Description');
        $stopReason = "Grew Back";

        $condition = new ConditionType($name, $onsetDateTime, $status, $stopDateTime, $stopReason);

        $relationshipCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $relationship = new CodableValue('Some Immunization', array($relationshipCode));

        $relativeName = new Person(new Name('Sir Derp Herpington'), NULL, 'autism');

        $dateBirth = new ApproxDate('2013', '12', '25');
        $dateDeath = new ApproxDate('2014', '12', '25');

        $regionOriginCode = new CodedValue('75', 'success/failure', array('illness status'), array('Version 1'));
        $regionOrigin  = new CodableValue('Failed', array($regionOriginCode));

        $relative = new FamilyHistoryRelative($relationship, $relativeName, $dateBirth, $dateDeath, $regionOrigin);

        self::$testObject = new FamilyHistory3Type($condition, $relative);
        parent::setUpBeforeClass();
    }
}