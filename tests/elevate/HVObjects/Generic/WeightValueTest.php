<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\Display;

class WeightValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/WeightValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\WeightValue';

        $display = new Display('lbs.', '120');

        self::$testObject = new WeightValue('85', $display);

        parent::setUpBeforeClass();
    }
}
 