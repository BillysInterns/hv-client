<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/5/13
 * Time: 9:53 AM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Prescription;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;

use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;

use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\StructuredMeasurement;
use elevate\HVObjects\Generic\GeneralMeasurement;


class PrescriptionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Prescription.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Prescription';


        // Name
        $titleCoded = new CodedValue('1337', 'Title', array('Title'), array('Version 117'));
        $title = new CodableValue("Dr.", array($titleCoded));

        $suffixCode = new CodedValue('9', 'Suffix', array('Suffix'), array('Version 1'));
        $suffix = new CodableValue('IX', array($suffixCode));

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
        $phone = new Phone("555-555-5555", "Home Phone", true);
        $email = new Email("Personal", "billy@theintern.com", true);
        $contact = new Contact($address, $email, $phone);

        // Type
        $typeCoded = new CodedValue('3', 'Type', array('Type'), array('Version 4'));
        $type = new CodableValue('Person', array($typeCoded));

        $prescribedBy = new Person($name, 'Microsoft', 'Internship', 'N7', $contact, $type);


        $date = new ApproxDate('2013', '12', '25');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '20', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
        $datePrescribed = new ApproxDateTime( $structured, 'description');

        $unitCode = new CodedValue('lbs.', 'weight type', array('weight units'), array('Version 1'));
        $units = new CodableValue('pounds', array($unitCode));
        $measurement = new StructuredMeasurement('47', $units);
        $amountPrescribed = new GeneralMeasurement('47 Pounds', $measurement);

        $codedValue            = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $substitution      = new CodableValue('Code', array($codedValue));

        $refills = 5;

        $daysSupply = 5;

        $prescriptionExpiration = new Date('2013', '12', '25');

        $codedValue            = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $instructions      = new CodableValue('Code', array($codedValue));

        self::$testObject = new Prescription($prescribedBy, $amountPrescribed, $datePrescribed, $daysSupply, $instructions, $prescriptionExpiration, $refills, $substitution);

        parent::setUpBeforeClass();
    }
}