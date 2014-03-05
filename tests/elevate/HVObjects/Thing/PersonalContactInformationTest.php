<?php

/**
 * @author jonfor
 */

namespace elevate\test\HVObjects\Thing;


use elevate\HVObjects\Thing\PersonalContactInformation;
use elevate\HVObjects\Thing\DataXML\PersonalContactInformationDataXML;
use elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Phone;

/**
 * Class PersonalContactInformationDataXMLTest
 * @package elevate\test\HVObjects\Thing
 */
class PersonalContactInformationDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/PersonalContactInformation.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\PersonalContactInformation';

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
        $dataXML = new PersonalContactInformationDataXML($personalContactInfoType, $common);
        self::$testObject = new PersonalContactInformation($dataXML);
        parent::setUpBeforeClass();
    }
}