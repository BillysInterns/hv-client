<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 2:32 PM
 */

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Thing\DataXML\DietaryIntakeDataXML;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType;
use elevate\HVObjects\Generic\Common;


class DietaryIntakeDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/DietaryIntake.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\DietaryIntakeDataXML';

        $codes = new CodedValue('Cake', 'Chocalate');
        $foodItem = new CodableValue('Food Item',array($codes));


        $dietaryIntakeType = new DietaryIntakeType($foodItem);
        $common = new Common('DietaryIntake Note', 'DietaryIntake Test', 'Some tags');

        self::$testObject = new DietaryIntakeDataXML($dietaryIntakeType, $common);
        parent::setUpBeforeClass();
    }

}
 