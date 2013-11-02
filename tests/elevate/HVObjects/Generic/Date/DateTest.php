<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\test\HVObjects\BaseObjectTest;
class DateTest extends BaseObjectTest
{

    public function setUp()
    {
        $this->sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/Date.xml';
        $this->objectNamespace = 'elevate\HVObjects\Generic\Date\Date';
        $this->testObject = new Date('2013', '12', '25');
        parent::setup();
    }

}
 