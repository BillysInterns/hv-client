<?php


namespace elevate\test\HVObjects\Generic\Date;

use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\test\HVObjects\BaseObjectTest;
class DateTimeTest extends BaseObjectTest
{

    public $dateTime;

    public function setUp()
    {
        parent::setup();
        $this->sampleXMLPath = __DIR__ . '/../../SampleXML/Generic/Date/DateTime.xml';
        $date = new Date('2013', '12', '25');
        $time = new Time('12', '30', '12');
        $this->dateTime = new DateTime($date, $time);
        $this->xmlString = $this->serializer->serialize($this->dateTime, 'xml');
    }

    public function testDeserialize()
    {
        $dateTime = $this->serializer->deserialize(
            $this->xmlString, 'elevate\HVObjects\Generic\Date\DateTime', 'xml'
        );

        $this->assertEquals($this->dateTime, $dateTime);
    }
}
 