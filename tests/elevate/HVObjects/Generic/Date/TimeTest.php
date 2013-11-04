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
        self::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/Time.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Date\Time';
        self::$testObject      = new Time('12', '20', '45');
        parent::setUpBeforeClass();
    }
}
 