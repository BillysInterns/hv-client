<?php


namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\Common;
use elevate\test\HVObjects\BaseObjectTest;

class CommonTest extends BaseObjectTest
{

    private $common;

    public function setUp()
    {
        parent::setUp();
        $this->sampleXMLPath = __DIR__ . '/../SampleXML/Generic/Common.xml';
        $this->common = new Common(
            'Note',
            'A Source',
            'health, vault, microsoft',
            '43252-432752-2342378421-473842',
            '3323-43242-4324234-43242',
            '<extra><tag1>Something</tag1><tag2>Another Tag</tag2></extra>'
        );
        $this->xmlString = $this->serializer->serialize($this->common, 'xml');
    }



    public function testDeserialize()
    {

    }
}
 