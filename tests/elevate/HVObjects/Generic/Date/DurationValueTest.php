<?php 

/*
* @author Sumit
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

use elevate\HVObjects\Generic\Date\DurationValue;

class DurationValueTest extends BaseObjectTest
{
	public static function setUpBeforeClass()
	{
		self::$sampleXMLPath   = __DIR__ . '/../../SampleXML/Generic/Date/DurationValue.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Date\DurationValue';
        
        $date = new ApproxDate('2013', '12', '25');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '20', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
		$startDate = new ApproxDateTime( $structured, 'description');
        
        $date = new ApproxDate('2013', '12', '30');
        $codedValue   = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $tz = new CodableValue('Code', array($codedValue));
        $time = new Time('12', '30', '45');
        $structured = new StructuredApproxDate($date,$time, $tz);
		$endDate = new ApproxDateTime( $structured, 'description');
        
		self::$testObject = new DurationValue( $endDate, $startDate);

        parent::setUpBeforeClass();
    	

	}
}