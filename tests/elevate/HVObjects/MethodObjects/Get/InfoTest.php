<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 7:31 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\Get;


use elevate\HVObjects\MethodObjects\Get\Info;
use elevate\HVObjects\MethodObjects\Get\RequestGroup;
use elevate\HVObjects\MethodObjects\ThingFilterSpec;
use elevate\HVObjects\MethodObjects\ThingFormatSpec;
use elevate\test\HVObjects\BaseObjectTest;

class InfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/Get/Info.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\Get\Info';

        $thingFilter1 = new ThingFilterSpec('92ba621e-66b3-4a01-bd73-74844aed4f5b');
        $thingFilter2 = new ThingFilterSpec('162dd12d-9859-4a66-b75f-96760d67072b');
        $thingFormat = new ThingFormatSpec(array('core'));
        $group1 = new RequestGroup($thingFilter1, $thingFormat, 100);
        $group2 = new RequestGroup($thingFilter2, $thingFormat, 100);
        $groups = array($group1, $group2);

        self::$testObject = new Info($groups);
        parent::setUpBeforeClass();
    }
}