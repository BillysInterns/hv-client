<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 2:11 PM
 */

namespace elevate\test\HVObjects\Generic;


use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Baby;
use elevate\HVObjects\Generic\Name;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;

class BabyTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Baby.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Baby';

        $name = new Name("FUll Baby Name");

        self::$testObject = new Baby($name);

        parent::setUpBeforeClass();
    }
}