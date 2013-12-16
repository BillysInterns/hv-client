<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;


class CustomExtensionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/CustomExtension.xml';
        parent::setUpBeforeClass();
    }

} 