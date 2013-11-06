<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/6/13
 * Time: 1:37 PM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;


use elevate\HVObjects\Thing\DataXML\Type\DeviceType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Person;


class DeviceTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/Device.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\DeviceType';


        $date  = new Date('2013', '12', '25');
        $time  = new Time('12', '30', '12');
        $when  = new DateTime($date, $time);

        $deviceName = 'Device';

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
        $vendor = new Person(
            $name, 'Microsoft', 'Internship', 'N7', $contact, $type
        );

        $model = 'Model';

        $serialNumber = 'Serial Number';

        $anatomicSite = 'asite';

        $description = 'Here is a fun Description';

        self::$testObject = new DeviceType($anatomicSite, $description, $deviceName, $model, $serialNumber, $vendor, $when);
        parent::setUpBeforeClass();

    }

} 