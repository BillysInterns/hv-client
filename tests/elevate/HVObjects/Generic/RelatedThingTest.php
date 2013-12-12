<?php
/** @author troussos **/

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\RelatedThing;
use elevate\HVObjects\Generic\ThingId;
use elevate\test\HVObjects\BaseObjectTest;

class RelatedThingTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/RelatedThing.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\RelatedThing';

        $thingId = new ThingId('47838-547395-358593-579395', 'SIUDFH-DFJDOF-DSFJOF-HFKDJO');

        self::$testObject = new RelatedThing($thingId, 'Associated Meds', '5789DHFK-9HF9DN9-3UFO03-D9UF');

        parent::setUpBeforeClass();
    }
}
 