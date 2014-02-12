<?php
/**
 * @author Jonfor
 */

use elevate\HVObjects\Thing\DataXML\Type\SchoolType;
use elevate\test\HVObjects\BaseObjectTest;

class SchoolTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/SchoolType.xml";
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\Type\SchoolType';

        $schoolName = "Dartmouth";
        $schoolType = "university";
        $speciality = ["autism"];

        self::$testObject = new SchoolType(
            $schoolName,
            $schoolType,
            $speciality

        );

        parent::setUpBeforeClass();
    }
}