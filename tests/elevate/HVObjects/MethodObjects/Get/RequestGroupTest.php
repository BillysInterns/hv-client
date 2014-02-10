<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 7:31 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\Get;


use elevate\HVObjects\MethodObjects\Get\RequestGroup;
use elevate\HVObjects\MethodObjects\ThingFilterSpec;
use elevate\HVObjects\MethodObjects\ThingFormatSpec;
use elevate\test\HVObjects\BaseObjectTest;

class RequestGroupTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/Get/RequestGroup.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\Get\RequestGroup';
        $thingFilter = new ThingFilterSpec('92ba621e-66b3-4a01-bd73-74844aed4f5b');
        $thingFormat = new ThingFormatSpec(array('core'));
        $requestGroup = new RequestGroup($thingFilter, $thingFormat, 100);
        $requestGroup->setIds(array());
        self::$testObject = $requestGroup;
        parent::setUpBeforeClass();
    }
}