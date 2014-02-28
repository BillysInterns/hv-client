<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 1:19 PM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\AdditionalNutritionFact;
use elevate\HVObjects\Generic\NutritionFact;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;

class AdditionalNutritionFactTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/AdditionalNutritionFact.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\AdditionalNutritionFact';

        $codes = new CodedValue('First Name', 'Last Name');
        $name = new CodableValue('Name',array($codes));

        $nutritionFact = new NutritionFact($name);

        self::$testObject = new AdditionalNutritionFact($nutritionFact);

        parent::setUpBeforeClass();
    }
}