<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\SchoolDataXML;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Common;

class SchoolDataXmlTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../SampleXML/Thing/DataXml/School.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\SchoolDataXML';

        $schoolName = 'Dartmouth';
        $instituteType = 'university';
        $speciality[] = 'autism';
        $current = true;

        $schoolType = new SchoolType(
            $schoolName,
            $instituteType,
            $speciality,
            $current

        );

        $common = new Common('Appspecific', 'unit test', 'tags');
        self::$testObject = new SchoolDataXML($schoolType, $common);
        parent::setUpBeforeClass();
    }
}