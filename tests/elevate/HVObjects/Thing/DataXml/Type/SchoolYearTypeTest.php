<?php
/**
 * @author Jonfor
 */

use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\test\HVObjects\BaseObjectTest;

class SchoolYearTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/SchoolYearType.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\Type\SchoolYearType';

        $grade = "1st grade";
        $name = new Name("Sir Derp Herpington");
        $person = new Person($name, NULL, "autism");

        self::$testObject = new SchoolYearType(
            $grade,
            $person
        );
        parent::setUpBeforeClass();
    }
}