<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\WeightValue;

class WeightValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/WeightValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\WeightValue';

        self::$testObject = new WeightValue('85', '120');

        parent::setUpBeforeClass();
    }
}
 