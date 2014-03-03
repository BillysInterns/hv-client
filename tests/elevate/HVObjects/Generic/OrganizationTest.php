<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 3:10 PM
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Organization;
use elevate\test\HVObjects\BaseObjectTest;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;



class OrganizationTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Organization.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Organization';

        $name = "Organization Name";

        self::$testObject = new Organization($name);


        parent::setUpBeforeClass();
    }


}
 