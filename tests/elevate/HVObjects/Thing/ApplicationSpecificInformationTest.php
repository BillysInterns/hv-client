<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\ApplicationSpecificInformation;
use elevate\HVObjects\Thing\DataXML\ApplicationSpecificInformationDataXML;
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
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

        $name = "Yale";
        $type = "university";
        $specialty = array("law");
        $school = new SchoolType($name, $type, $specialty);

        $grade = "1st grade";
        $teacher = new Person(new Name("Sir Derp Herpington"), NULL, "internship");
        $schoolYear = new SchoolYearType($grade, $teacher);

        $applicationSpecificInformationType = new ApplicationSpecificInformationType(
            $formatAppId,
            $formatTag,
            $school,
            $schoolYear,
            $summary,
            $when


        );

        $common = new Common('Appspecific', 'unit test', 'tags');

        $dataXML = new ApplicationSpecificInformationDataXML($applicationSpecificInformationType, $common);

        self::$testObject = new ApplicationSpecificInformation($dataXML);
        parent::setUpBeforeClass();
    }
}