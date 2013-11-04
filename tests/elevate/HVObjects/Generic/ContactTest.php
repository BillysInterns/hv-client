<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 12:03 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\test\HVObjects\BaseObjectTest;

class ContactTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Contact.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Contact';

        $address = new Address(
            'Home Address',
            '123 Fake Ave',
            'Faketon',
            'FA',
            '00700',
            'Fake',
            'United States',
            true
        );
        $phone = new Phone("Home Phone", true, "555-555-5555");
        $email = new Email("billy@theintern.com", "Personal", true);

        self::$testObject = new Contact($address, $email, $phone);

        parent::setUpBeforeClass();
    }

}