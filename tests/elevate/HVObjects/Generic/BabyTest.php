<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 2:11 PM
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\LengthValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Baby;
use elevate\HVObjects\Generic\Name;

use elevate\HVObjects\Generic\CodableValue;

class BabyTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Baby.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Baby';

        $name = new Name("FUll Baby Name");

        $gender = new CodableValue('test');

        self::$testObject = new Baby($name, $gender, new LengthValue(2), new LengthValue(3), 'test');

        parent::setUpBeforeClass();
    }
}