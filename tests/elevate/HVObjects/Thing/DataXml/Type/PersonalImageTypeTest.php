<?php
/** @author Jonfor **/

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\PersonalImageType;
use elevate\test\HVObjects\BaseObjectTest;

class PersonalImageTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/PersonalImage.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\Type\PersonalImageType';

        self::$testObject = new PersonalImageType();

        parent::setUpBeforeClass();
    }
}