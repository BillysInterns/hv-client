<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Common;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\RelatedThing;
use elevate\HVObjects\Generic\ThingId;

class CommonTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Common.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Common';

        $thingId      = new ThingId('1234567890', 'abcdefgh');
        $relatedThing = new RelatedThing($thingId, 'rel-type', 'client-thing');

        self::$testObject = new Common(
            'Note',
            'A Source',
            'health, vault, microsoft',
            array($relatedThing),
            '3323-43242-4324234-43242',
            '<extra><tag1>Something</tag1><tag2>Another Tag</tag2></extra>'
        );
        parent::setUpBeforeClass();
    }

}
 