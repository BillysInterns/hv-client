<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 1:20 PM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\FoodEnergy;
use elevate\HVObjects\Generic\Display;

class FoodEnergyTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/FoodEnergy.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\FoodEnergy';

        $display = new Display('lbs.', '120');

        self::$testObject = new FoodEnergy('500', $display);

        parent::setUpBeforeClass();
    }

}
 