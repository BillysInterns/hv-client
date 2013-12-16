<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Recurrent;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\RelatedThing;
use elevate\HVObjects\Generic\ThingId;

class CommonTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Common.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Common';

        $relatedThing = new RelatedThing('123456789', 'version', 'rel-type');

        $time = new Time('10', '07', '45');
        $date = new ApproxDate('2013', '12', '10');
        $structued = new StructuredApproxDate($date, $time);
        $dateTime = new ApproxDateTime($structued, 'TIME');

        $recurrentThing = new Recurrent($dateTime, 'Always', 'Some Type');

        self::$testObject = new Common(
            'Note',
            'A Source',
            'health, vault, microsoft',
            array($relatedThing),
            '3323-43242-4324234-43242',
            array('recurrent' => $recurrentThing)
        );
        parent::setUpBeforeClass();
    }

}
 