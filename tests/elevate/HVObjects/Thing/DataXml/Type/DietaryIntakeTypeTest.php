<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 11:29 AM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType;

class DietaryIntakeTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/DietaryIntake.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType';

       $codes = new CodedValue('Cake', 'Chocalate');
       $foodItem = new CodableValue('Food Item',array($codes));


        self::$testObject = new DietaryIntakeType($foodItem);
        parent::setUpBeforeClass();
    }
}