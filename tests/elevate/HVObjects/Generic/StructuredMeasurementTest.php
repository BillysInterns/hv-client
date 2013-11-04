<?php
/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\StructuredMeasurement;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;

class StructuredMeasurementTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/StructuredMeasurement.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\StructuredMeasurement';

        $unitCode = new CodedValue('Generic Unit', 'Unit Type', array('Unit Family'), array('Version 1'));
        $units = new CodableValue('Units', array($unitCode));
        self::$testObject = new StructuredMeasurement('45', $units);

        parent::setUpBeforeClass();
    }
}
 