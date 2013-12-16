<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Recurrent;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\Time;

class RecurrentTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/Recurrent.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Recurrent';

        $date = new ApproxDate('2013', '12', '25');

        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));

        $time = new Time('12', '20', '45');

        $structured = new StructuredApproxDate($date,$time, $tz);



        $approxDT= new ApproxDateTime( $structured, 'description');



        self::$testObject = new Recurrent($approxDT, 'abc', 'some');
        parent::setUpBeforeClass();
    }

} 