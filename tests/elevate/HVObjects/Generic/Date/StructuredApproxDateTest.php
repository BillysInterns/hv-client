<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 11:27 AM
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;

class StructuredApproxDateTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/StructuredApproxDate.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Date\StructuredApproxDate';

        $date = new ApproxDate('2013', '12', '25');

        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));

        $time = new Time('12', '20', '45');

        self::$testObject      = new StructuredApproxDate($date,$time, $tz);
        parent::setUpBeforeClass();
    }

} 