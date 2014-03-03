<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/5/13
 * Time: 3:03 PM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Thing\DataXML\Type\Immunization2Type;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Person;



class Immunization2TypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/Immunization2.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\Immunization2Type';

        $nameCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $nameOfImu = new CodableValue("Some Immunization", array($nameCode));

        $date = new ApproxDate('2013', '12', '25');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '20', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
        $administrationDate  = new ApproxDateTime( $structured, 'description');

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
        $phone = new Phone("555-555-5555", "Home Phone", true);
        $email = new Email("Personal", "billy@theintern.com", true);
        $contact = new Contact($address, $email, $phone);
        $typeCoded = new CodedValue('3', 'Type', array('Type'), array('Version 4'));
        $type = new CodableValue('Person', array($typeCoded));
        $administrator = new Person(
            $name, 'Microsoft', 'Internship', 'N7', $contact, $type
        );

        $nameCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $manufacturer = new CodableValue("Some Immunization", array($nameCode));

        $lot = 'LOT';

        $nameCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $route = new CodableValue("Some Immunization", array($nameCode));

        $expirationDate  = new ApproxDate('2013', '12', '25');

        $sequence = 'SEQUENCE';

        $nameCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $anatomicSurface = new CodableValue("Some Immunization", array($nameCode));

        $adverseEvent = 'AdverseEvent';

        $consent = 'Consent';

        self::$testObject = new Immunization2Type($administrationDate, $administrator, $adverseEvent, $anatomicSurface, $consent, $expirationDate, $lot, $manufacturer, $nameOfImu, $route, $sequence);

        parent::setUpBeforeClass();
    }
} 