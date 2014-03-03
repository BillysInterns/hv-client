<?php
/** author jonfor */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\FamilyHistoryRelative;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\test\HVObjects\BaseObjectTest;

class FamilyHistoryRelativeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/FamilyHistoryRelative.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\FamilyHistoryRelative';

        $relationshipCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $relationship     = new CodableValue('Some Immunization', array($relationshipCode));

        $relativeName = new Person(new Name('Sir Derp Herpington'), NULL, 'autism');

        $dateBirth = new ApproxDate('2013', '12', '25');
        $dateDeath = new ApproxDate('2014', '12', '25');

        $regionOriginCode = new CodedValue('75', 'success/failure', array('illness status'), array('Version 1'));
        $regionOrigin     = new CodableValue('Failed', array($regionOriginCode));

        self::$testObject = new FamilyHistoryRelative($relationship, $relativeName, $dateBirth, $dateDeath, $regionOrigin);
        parent::setUpBeforeClass();
    }
}