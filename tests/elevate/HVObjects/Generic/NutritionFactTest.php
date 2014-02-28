<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 1:20 PM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\NutritionFact;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;

class NutritionFactTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/NutritionFact.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\NutritionFact';

        $codes = new CodedValue('First Name', 'Last Name');
        $name = new CodableValue('Name',array($codes));


        self::$testObject = new NutritionFact($name);

        parent::setUpBeforeClass();
    }

}
 