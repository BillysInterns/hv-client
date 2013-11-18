<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\BodyCompositionValue;
use elevate\HVObjects\Generic\WeightValue;
use elevate\HVObjects\Generic\Display;

class BodyCompositionValueTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/BodyCompositionValue.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\BodyCompositionValue';

        $display = new Display('lbs.', '194');

        $massValue = new WeightValue('34', $display);

        self::$testObject = new BodyCompositionValue($massValue, '34');

        parent::setUpBeforeClass();
    }

}
 