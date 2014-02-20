<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\SchoolDataXML;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\HVObjects\Thing\School;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Common;

class SchoolTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../SampleXML/Thing/School.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\School';

        $schoolName = 'Dartmouth';
        $instituteType = 'university';
        $speciality[] = 'autism';

        $schoolType = new SchoolType(
            $schoolName,
            $instituteType,
            $speciality

        );

        $common = new Common('Appspecific', 'unit test', 'tags');

        $dataXML = new SchoolDataXML($schoolType, $common);

        self::$testObject = new School($dataXML);
        parent::setUpBeforeClass();
    }
}