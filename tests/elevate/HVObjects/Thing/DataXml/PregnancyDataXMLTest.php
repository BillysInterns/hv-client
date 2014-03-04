<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/4/14
 * Time: 8:52 AM
 */

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Generic\Delivery;
use elevate\HVObjects\Generic\Organization;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\PregnancyType;

use elevate\HVObjects\Thing\DataXML\PregnancyDataXML;

class PregnancyDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/Pregnancy.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\PregnancyDataXML';

        $location = new Organization('Organization Name');
        $delivery = new Delivery($location);

        $pregnancyType = new PregnancyType($delivery);


        self::$testObject = new PregnancyDataXML($pregnancyType);
        parent::setUpBeforeClass();
    }

}
 