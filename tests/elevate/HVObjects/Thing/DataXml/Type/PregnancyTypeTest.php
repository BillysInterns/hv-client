<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/4/14
 * Time: 8:51 AM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Delivery;
use elevate\HVObjects\Generic\Organization;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\PregnancyType;

class PregnancyTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/Pregnancy.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\PregnancyType';

        $location = new Organization('Organization Name');
        $delivery = new Delivery($location);

        self::$testObject = new PregnancyType($delivery);
        parent::setUpBeforeClass();
    }

}
 