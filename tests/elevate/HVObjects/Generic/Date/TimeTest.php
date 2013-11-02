<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Time;
use elevate\test\HVObjects\BaseObjectTest;

class TimeTest extends BaseObjectTest
{

    public function setUp()
    {
        $this->sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/Time.xml';
        $this->objectNamespace = 'elevate\HVObjects\Generic\Date\Time';
        $this->testObject      = new Time('12', '20', '45');
        parent::setup();
    }
}
 