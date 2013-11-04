<?php


namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\GeneralMeasurement;
use elevate\HVObjects\Generic\StructuredMeasurement;
use elevate\test\HVObjects\BaseObjectTest;

class GeneralMeasurementTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/GeneralMeasurement.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\GeneralMeasurement';
        $unitCode = new CodedValue('lbs.', 'weight type', array('weight units'), array('Version 1'));
        $units = new CodableValue('pounds', array($unitCode));
        $measurement = new StructuredMeasurement('47', $units);
        self::$testObject = new GeneralMeasurement('47 Pounds', $measurement);
        parent::setUpBeforeClass();
    }
}
 