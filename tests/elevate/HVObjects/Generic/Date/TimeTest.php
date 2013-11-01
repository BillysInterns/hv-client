<?php


namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Time;
use elevate\test\HVObjects\BaseObjectTest;
class TimeTest extends BaseObjectTest
{

    private $time;

    public function setUp()
    {
        parent::setup();
        $this->sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/Time.xml';
        $this->time = new Time('12', '20', '45');
        $this->xmlString = $this->serializer->serialize($this->time, 'xml');
    }

    public function testDeserialize()
    {
        $time = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\Date\Time', 'xml'
        );

        $this->assertEquals($this->time, $time);
    }
}
 