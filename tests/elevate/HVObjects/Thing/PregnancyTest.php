<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/4/14
 * Time: 8:52 AM
 */

namespace elevate\test\HVObjects\Thing;

use elevate\HVObjects\Generic\Delivery;
use elevate\HVObjects\Generic\Organization;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\PregnancyType;
use elevate\HVObjects\Thing\DataXML\PregnancyDataXML;
use elevate\HVObjects\Thing\Pregnancy;

class PregnancyTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/Pregnancy.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\Pregnancy';


        $location = new Organization('Organization Name');
        $delivery = new Delivery($location);

        $pregnancyType = new PregnancyType($delivery);


        $pregnacyDataXML = new PregnancyDataXML($pregnancyType);

        self::$testObject = new Pregnancy($pregnacyDataXML);
        parent::setUpBeforeClass();
    }
}
 