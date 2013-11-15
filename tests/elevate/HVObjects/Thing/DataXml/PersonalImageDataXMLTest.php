<?php

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\Type\PersonalImageType;
use elevate\HVObjects\Thing\DataXML\PersonalImageDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Common;
use JMS\Serializer\SerializationContext;

class PersonalImageDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/PersonalImage.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\PersonalImageDataXML';

        $personalImageType = '';

        $common = new Common('Personal Image Note', 'Personal image Source', 'PersonalImageTag');

        self::$testObject = new PersonalImageDataXML($personalImageType, $common);
        parent::setUpBeforeClass();
    }

} 