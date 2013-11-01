<?php


namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\test\HVObjects\BaseObjectTest;
class DateTest extends BaseObjectTest
{

    private $date;

    public function setUp()
    {
        parent::setup();
        $this->sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/Date.xml';
        $this->date = new Date('2013', '12', '25');
        $this->xmlString     = $this->serializer->serialize($this->date, 'xml');
    }

    public function testDeserialize()
    {
        $date = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\Date\Date', 'xml'
        );

        $this->assertEquals($this->date, $date);
    }

}
 