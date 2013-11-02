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

    public function setUp()
    {
        $this->sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/DateTime.xml';
        $this->objectNamespace = 'elevate\HVObjects\Generic\Date\DateTime';
        $date = new Date('2013', '12', '25');
        $time = new Time('12', '30', '12');
        $this->testObject = new DateTime($date, $time);
        parent::setup();
    }
}
 