<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/6/13
 * Time: 1:37 PM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;


use elevate\HVObjects\Thing\DataXML\Type\DeviceType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;
use elevate\HVObjects\Generic\Contact;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\AppointmentExtension;
use elevate\HVObjects\Generic\Recurrent;

/*

class AppointmentExtensionTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/AppointmentExtension.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\AppointmentExtension';


        $dateTime = '2013-12-15T00:06:21+00:00';
        $recurrentThing = new Recurrent( $dateTime, 'mon' );
        $apptExtension = new AppointmentExtension('Mentis Unit Test', $recurrentThing);

        self::$testObject = $apptExtension;
        parent::setUpBeforeClass();

    }

} */