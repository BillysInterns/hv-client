<?php
/**
 * @author Jonfor
 */

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\test\HVObjects\BaseObjectTest;

class ApplicationSpecificInformationTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/ApplicationSpecificInformationType.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\Type\ApplicationSpecificInformationType';

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

        self::$testObject = new ApplicationSpecificInformationType(
            $formatAppId,
            $formatTag,
            $school,
            $schoolYear,
            $summary,
            $when
        );

        parent::setUpBeforeClass();
    }
}