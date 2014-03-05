<?php
/** @author jonfor */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType;

class PersonalContactInformationTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/PersonalContactInformation.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType';

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
        $phone = new Phone("555-555-5555", "Home Phone", true);
        $email = new Email("Personal", "billy@theintern.com", true);
        $contact =  new Contact($address, $email, $phone);

        self::$testObject = new PersonalContactInformationType($contact);
        parent::setUpBeforeClass();
    }
}