<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\SchoolYearDataXML;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Common;

class SchoolYearDataXmlTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../SampleXML/Thing/DataXml/SchoolYear.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\SchoolYearDataXML';

        $grade = "1st grade";
        $name = new Name("Sir Derp Herpington");
        $person = new Person($name, NULL, "autism");

        $schoolYearType = new SchoolYearType(
            $grade,
            $person
        );

        $common = new Common('Appspecific', 'unit test', 'tags');
        self::$testObject = new SchoolYearDataXML($schoolYearType, $common);
        parent::setUpBeforeClass();
    }
}