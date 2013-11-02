<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Time;
use elevate\test\HVObjects\BaseObjectTest;

class TimeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        TimeTest::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/Time.xml';
        TimeTest::$objectNamespace = 'elevate\HVObjects\Generic\Date\Time';
        TimeTest::$testObject      = new Time('12', '20', '45');
        parent::setUpBeforeClass();
    }
}
 