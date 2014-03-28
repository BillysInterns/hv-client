<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/6/13
 * Time: 9:37 AM
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Thing\DataXML\Type\Immunizationv2Type;
use elevate\HVObjects\Thing\DataXML\Immunizationv2DataXML;
use elevate\HVObjects\Thing\Immunizationv2;
use elevate\HVObjects\Generic\Common;

class Immunization2Test extends BaseObjectTest
{
	public static function setUpBeforeClass()
    {
		self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/Immunizationv2.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\Immunization2';

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
        $phone = new Phone( "555-555-5555", "Home Phone", true);
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
        $route = new CodableValue("Some ImmuPnization", array($nameCode));

        $expirationDate  = new ApproxDate('2013', '12', '25');

        $sequence = 'SEQUENCE';

        $nameCode = new CodedValue('154', 'SomeImu', array('Some Immunization'), array('Version 1'));
        $anatomicSurface = new CodableValue("Some Immunization", array($nameCode));

        $adverseEvent = 'AdverseEvent';

        $consent = 'Consent';

        $immunization2Type = new Immunizationv2Type($administrationDate, $administrator, $adverseEvent, $anatomicSurface, $consent, $expirationDate, $lot, $manufacturer, $nameOfImu, $route, $sequence);

        $common = new Common('Immunization Note', 'Immunization Source', 'immunizationTag');

        $immunization2DataXML = new Immunizationv2DataXML($immunization2Type, $common);

        self::$testObject = new Immunizationv2($immunization2DataXML);

        parent::setUpBeforeClass();

	}

} 