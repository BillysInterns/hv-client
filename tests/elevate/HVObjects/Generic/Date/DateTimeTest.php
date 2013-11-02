<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\test\HVObjects\BaseObjectTest;
class DateTimeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        DateTimeTest::$sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/DateTime.xml';
        DateTimeTest::$objectNamespace = 'elevate\HVObjects\Generic\Date\DateTime';
        $date = new Date('2013', '12', '25');
        $time = new Time('12', '30', '12');
        DateTimeTest::$testObject = new DateTime($date, $time);
        parent::setUpBeforeClass();
    }
}
 