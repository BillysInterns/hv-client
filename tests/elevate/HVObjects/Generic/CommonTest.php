<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Common;
use elevate\test\HVObjects\BaseObjectTest;

class CommonTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        CommonTest::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Common.xml';
        CommonTest::$objectNamespace = 'elevate\HVObjects\Generic\Common';
        CommonTest::$testObject      = new Common(
            'Note',
            'A Source',
            'health, vault, microsoft',
            '43252-432752-2342378421-473842',
            '3323-43242-4324234-43242',
            '<extra><tag1>Something</tag1><tag2>Another Tag</tag2></extra>'
        );
        parent::setUpBeforeClass();
    }

}
 