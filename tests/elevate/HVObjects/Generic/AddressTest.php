<?php
/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Address;
use elevate\test\HVObjects\BaseObjectTest;

class AddressTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Address.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Address';
        self::$testObject      = new Address(
            'New Address', '123 Fake Street', 'Seattle', 'WA', '94627', 'Washington', 'USA', FALSE
        );
        parent::setUpBeforeClass();
    }
}
 