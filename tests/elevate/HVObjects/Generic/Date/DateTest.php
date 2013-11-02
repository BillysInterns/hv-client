<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\test\HVObjects\BaseObjectTest;
class DateTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        DateTest::$sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/Date.xml';
        DateTest::$objectNamespace = 'elevate\HVObjects\Generic\Date\Date';
        DateTest::$testObject = new Date('2013', '12', '25');
        parent::setUpBeforeClass();
    }

}
 