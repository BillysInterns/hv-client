<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\ApplicationSpecificInformation;
use elevate\HVObjects\Thing\DataXML\ApplicationSpecificInformationDataXML;
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\School;
use elevate\HVObjects\Generic\SchoolYear;
use elevate\HVObjects\Generic\Common;

class ApplicationSpecificInformationTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Thing/ApplicationSpecificInformation.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\ApplicationSpecificInformation';

        $formatAppId = "TESTAppId";
        $formatTag = "TestTag";
        $date = new Date(2014, 1, 15);
        $time = new Time(4, 0, 0, 0);
        $when = new DateTime($date, $time);
        $summary = "CamelCasedSentencesAreReallyCool";
        $school = new School("Dartmouth", "University");
        $schoolYear = new SchoolYear("1st grade", "Mrs. Krabappel", $school);

        $applicationSpecificInformationType = new ApplicationSpecificInformationType(
            $formatAppId,
            $formatTag,
            $when,
            $summary,
            $schoolYear,
            $school
        );

        $common = new Common('Appspecific', 'unit test', 'tags');

        $dataXML = new ApplicationSpecificInformationDataXML($applicationSpecificInformationType, $common);

        self::$testObject = new ApplicationSpecificInformation($dataXML);
        parent::setUpBeforeClass();
    }
}