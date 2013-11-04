<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Awakening;
use elevate\test\HVObjects\BaseObjectTest;

class AwakeningTest extends BaseObjectTest
{

    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Awakening.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Awakening';

        $date = new Date(1991, 2, 4);
        $time = new Time(4, 20, 28, 9);
        $dateTime = new DateTime($date, $time);

        self::$testObject = new Awakening($dateTime, 10);

        parent::setUpBeforeClass();
    }

}