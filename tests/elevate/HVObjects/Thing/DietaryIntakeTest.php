<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 2:50 PM
 */

namespace elevate\test\HVObjects\Thing;

use elevate\HVObjects\Thing\DataXML\DietaryIntakeDataXML;
use elevate\HVObjects\Thing\DietaryIntake;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType;
use elevate\HVObjects\Generic\Common;


class DietaryIntakeTestt extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Thing/DietaryIntake.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DietaryIntake';

        $codes    = new CodedValue('Cake', 'Chocalate');
        $foodItem = new CodableValue('Food Item', array($codes));


        $dietaryIntakeType = new DietaryIntakeType($foodItem);
        $common            = new Common('DietaryIntake Note', 'DietaryIntake Test', 'Some tags');

        $dietaryIntakeDataXML = new DietaryIntakeDataXML($dietaryIntakeType, $common);

        self::$testObject = new DietaryIntake($dietaryIntakeDataXML);
        parent::setUpBeforeClass();
    }

}