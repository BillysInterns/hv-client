<?php
/*@author Jonfor */

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Extension;

class ExtensionTest extends BaseObjectTest
{
    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Extension.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Extension';

        $domain = "recipricosity";
        $subdomain = "myocardial";

        self::$testObject = new Extension();


        parent::setUpBeforeClass();
    }
}