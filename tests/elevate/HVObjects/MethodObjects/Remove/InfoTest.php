<?php
/** @author troussos **/

namespace elevate\test\HVObjects\MethodObjects\Remove;

use elevate\HVObjects\Generic\ThingId;
use elevate\HVObjects\MethodObjects\Remove\Info;
use elevate\test\HVObjects\BaseObjectTest;

class InfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/Remove/Info.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\Remove\Info';

        $thing1 = new ThingId('4638947328947328472309', '4u3y2984723894y2u3489239482');
        $thing2 = new ThingId('hdusfydufuiefyuirefu0', 'vuiry9fgrfjr9gr0gujr9reiferug9ier');

        $things = array($thing1, $thing2);

        self::$testObject = new Info($things);
        parent::setUpBeforeClass();
    }
}