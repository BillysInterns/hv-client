<?php

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Name;
use elevate\test\HVObjects\BaseObjectTest;

class PersonTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Person.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Person';

        // Name
        $titleCoded = new CodedValue('1337', 'Title', array('Title'), array('Version 117'));
        $title = new CodableValue("Dr.", array($titleCoded));

        $suffixCode = new CodedValue('9', 'Suffix', array('Suffix'), array('Version 1'));
        $suffix = new CodedValue('IX', array($suffixCode));

        $name = new Name(
            'Dr. Billy D Intern IX', $title, 'Billy', 'D', 'Intern', $suffix
        );

        // Contact
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
        $contact = new Contact($address, $email, $phone);

        // Type
        $typeCoded = new CodedValue('3', 'Type', array('Type'), array('Version 4'));
        $type = new CodableValue('Person', array($typeCoded));

        self::$testObject = new Person(
            $name, 'Microsoft', 'Internship', 'N7', $contact, $type
        );

        parent::setUpBeforeClass();

    }

}