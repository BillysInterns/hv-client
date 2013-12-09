<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\EmergencyOrProviderContactType;
use elevate\test\HVObjects\BaseObjectTest;

class EmergencyOrProviderContactTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/EmergencyOrProviderContact.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\EmergencyOrProviderContactType';

        $title = new CodableValue('Sr.');

        $name = new Name('Billy D. Intern', $title, 'Billy', 'D', 'Intern');

        $address = new Address('Work', '123 Fake Street', 'Raratin', 'NJ', '12421', 'USA', 'Somewhere', TRUE);

        $email = new Email('Work', 'bill@theinterns.com', TRUE);

        $phone = new Phone('Mobile', FALSE, '654.213.4321');

        $contact = new Contact($address, $email, $phone);

        $typeCode = new CodedValue('wc-dc', 'providerTypes');
        $type = new CodableValue('Doctor', array($typeCode));

        self::$testObject = new EmergencyOrProviderContactType($name, 'Billy\'s Practice', 'Summer Internship', '5784-5436-54367-54367', $contact, $type);

        parent::setUpBeforeClass();
    }
}
 