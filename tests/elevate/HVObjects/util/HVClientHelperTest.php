<?php

/**
 * @author ofields
 */

namespace elevate\test\HVObjects;

use elevate\util\HVClientHelper;
use elevate\util\InfoHelper;


/**
 * Class HVClientHelperTest
 * @package elevate\test\HVObjects
 * @group hvclienthelper
 */
class HVClientHelperTest extends \PHPUnit_Framework_TestCase
{

    public function testHVInfoAsXML()
    {
        $info = InfoHelper::getHVInfoForTypeId("162dd12d-9859-4a66-b75f-96760d67072b");
        $xml = HVClientHelper::HVInfoAsXML($info);
        $this->assertNotNull($xml);
    }

}