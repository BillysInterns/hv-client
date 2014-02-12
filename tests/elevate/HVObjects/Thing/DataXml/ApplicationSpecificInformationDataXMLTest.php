<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\ApplicationSpecificInformationDataXML;
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Common;

class ApplicationSpecificInformationDataXmlTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../SampleXML/Thing/DataXml/ApplicationSpecificInformation.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\ApplicationSpecificInformationDataXML';

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
        self::$testObject = new ApplicationSpecificInformationDataXML($applicationSpecificInformationType, $common);
        parent::setUpBeforeClass();
    }
}