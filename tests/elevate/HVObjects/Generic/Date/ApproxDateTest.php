<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 10:26 AM
 */

namespace elevate\test\HVObjects\Generic\Date;


use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\test\HVObjects\BaseObjectTest;

class ApproxDateTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/ApproxDate.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Date\ApproxDate';
        self::$testObject      = new ApproxDate('2013', '12', '25');
        parent::setUpBeforeClass();
    }
}