<?php
/** @author troussos */

namespace elevate\test\HVObjects\Generic;


use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Email;

class EmailTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/Email.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Email';
        self::$testObject = new Email('billy@theintern.com', 'Personal Email', FALSE);
        parent::setUpBeforeClass();
    }

}
 