<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 9:49 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Phone;
use elevate\test\HVObjects\BaseObjectTest;

class PhoneTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Phone.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Phone';
        self::$testObject       = new Phone(
            'New Phone', true, '555-555-5555'
        );
        parent::setUpBeforeClass();
    }
}