<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Thing\SchoolYear;
use elevate\HVObjects\Thing\DataXML\SchoolYearDataXML;
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Common;

class SchoolYearTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Thing/SchoolYear.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\SchoolYear';

        $grade = '1st grade';
        $name = new Name('Sir Derp Herpington');
        $person = new Person($name, NULL, 'autism');

        $schoolYearType = new SchoolYearType(
            $grade,
            $person
        );

        $common = new Common('Appspecific', 'unit test', 'tags');

        $dataXML = new SchoolYearDataXML($schoolYearType, $common);

        self::$testObject = new SchoolYear($dataXML);
        parent::setUpBeforeClass();
    }
}