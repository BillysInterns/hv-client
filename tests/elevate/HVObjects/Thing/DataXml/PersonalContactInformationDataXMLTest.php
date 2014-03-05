<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\PersonalContactInformationDataXML;
use elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Phone;

class PersonalContactInformationDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/PersonalContactInformation.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\PersonalContactInformationDataXML';

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
        $personalContactInfoType = new PersonalContactInformationType($contact);

        $common = new Common('Appspecific', 'unit test', 'tags');
        self::$testObject = new PersonalContactInformationDataXML($personalContactInfoType, $common);
        parent::setUpBeforeClass();
    }
}