<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 10:40 AM
 */

namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;

use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;

/** @XmlRoot("approx-date-time") */
class ApproxDateTimeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/ApproxDateTime.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Date\ApproxDateTime';

        $date = new ApproxDate('2013', '12', '25');

        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));

        $time = new Time('12', '20', '45');

        $structured = new StructuredApproxDate($date,$time, $tz);



        self::$testObject      = new ApproxDateTime( $structured, 'description');
        parent::setUpBeforeClass();
    }
} 