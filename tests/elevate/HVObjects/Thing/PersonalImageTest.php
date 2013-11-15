<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/15/13
 * Time: 12:40 PM
 */

namespace elevate\test\HVObjects\Thing;

use elevate\HVObjects\Thing\DataXML\Type\PersonalImageType;
use elevate\HVObjects\Thing\DataXML\PersonalImageDataXML;
use elevate\HVObjects\Thing\PersonalImage;
use elevate\HVObjects\Generic\Common;
use elevate\test\HVObjects\BaseObjectTest;

class PersonalImageTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/PersonalImage.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\PersonalImage';

        $personalImageType = '';

        $common = new Common('Personal Image Note', 'Personal image Source', 'PersonalImageTag');

        $personaImageDataXML = new PersonalImageDataXML($personalImageType, $common);

        self::$testObject = new PersonalImage($personaImageDataXML);
        parent::setUpBeforeClass();
    }
}