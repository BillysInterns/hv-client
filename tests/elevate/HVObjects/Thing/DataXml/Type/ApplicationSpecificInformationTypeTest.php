<?php
/**
 * @author Jonfor
 */

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\School;
use elevate\HVObjects\Generic\SchoolYear;
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;
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
        $school = new School("Dartmouth", "university", array("test"));
        $schoolYear = new SchoolYear("1st grade", "Mrs. Krabappel", $school);

        self::$testObject = new ApplicationSpecificInformationType(
            $formatAppId,
            $formatTag,
            $when,
            $summary,
            $schoolYear,
            $school

        );

        parent::setUpBeforeClass();
    }
}