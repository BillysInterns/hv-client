<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/4/14
 * Time: 8:51 AM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Baby;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Delivery;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Organization;
use elevate\HVObjects\Generic\Phone;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\PregnancyType;

class PregnancyTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/Pregnancy.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\PregnancyType';

        $address = new Address('test', 'johnson', 'new brunswick', 'townsville', 'new jersey', '08854', 'united states', TRUE);
        $email = new Email('Personal Email','billy@theintern.com', TRUE);
        $phone = new Phone('555-555-5555', 'New Phone', true);
        $contact = new Contact($address, $email, $phone);

        $type = new CodableValue('test');
        $organization = new Organization('Organization Name', $contact, $type, 'www.test.com');


        $baby = new Baby(new Name("FUll Baby Name"));

        $delivery = new Delivery($organization, NULL, NULL, $baby);

        self::$testObject = new PregnancyType($delivery);
        parent::setUpBeforeClass();
    }

}
 