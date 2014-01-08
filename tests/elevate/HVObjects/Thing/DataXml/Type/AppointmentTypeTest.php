<?php

/**
* @author Sumit
**/

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\DurationValue;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Thing\DataXML\Type\AppointmentType;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Person;

class AppointmentTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/Appointment.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\AppointmentType';

        $date = new Date('2013', '12', '25');
        $time = new Time('12', '30', '12');
        $when = new DateTime($date, $time);
        
        $date = new ApproxDate('2013', '12', '25');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '20', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
		$startDate = new ApproxDateTime( $structured, 'description');
        $date = new ApproxDate('2013', '12', '30');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '30', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
		$endDate = new ApproxDateTime( $structured, 'description');
		$duration = new DurationValue( $endDate, $startDate);

		$codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $service = new CodableValue('Code', array($codedValue));

        $titleCoded = new CodedValue('1337', 'Title', array('Title'), array('Version 117'));
        $title = new CodableValue("Dr.", array($titleCoded));
        $suffixCode = new CodedValue('9', 'Suffix', array('Suffix'), array('Version 1'));
        $suffix = new CodableValue('IX', array($suffixCode));
        $name = new Name(
            'Dr. Billy D Intern IX', $title, 'Billy', 'D', 'Intern', $suffix
        );
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
        $email = new Email("Personal", "billy@theintern.com", true);
        $contact = new Contact($address, $email, $phone);
        $typeCoded = new CodedValue('3', 'Type', array('Type'), array('Version 4'));
        $type = new CodableValue('Person', array($typeCoded));

        $clinic = new Person(
            $name, 'Microsoft', 'Internship', 'N7', $contact, $type
        );

        $codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $specialty = new CodableValue('Code', array($codedValue));

        $codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $status = new CodableValue('Code', array($codedValue));

        $codedValue = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $careClass = new CodableValue('Code', array($codedValue));

        self::$testObject = new AppointmentType($careClass, $clinic, $duration, $service, $specialty, $status, $when);
        parent::setUpBeforeClass();


	}
}