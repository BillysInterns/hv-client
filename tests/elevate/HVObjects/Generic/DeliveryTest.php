<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 3:10 PM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Delivery;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Organization;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;



class DeliveryTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Delivery.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Delivery';

        $name = "Organization Name";

        $organization = new Organization($name);

        self::$testObject = new Delivery($organization);


        parent::setUpBeforeClass();
    }

}
 