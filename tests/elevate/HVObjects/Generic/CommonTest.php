<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Common;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\RelatedThing;

class CommonTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Common.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Common';

        $relatedThing = new RelatedThing('123456789', 'version', 'rel-type');

        self::$testObject = new Common(
            'Note',
            'A Source',
            'health, vault, microsoft',
            array($relatedThing),
            '3323-43242-4324234-43242'
        );
        parent::setUpBeforeClass();
    }

}
 