<?php

/**
 * @author troussos
 */
namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\PersonId;

class PersonIdTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/PersonId.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\PersonId';

        self::$testObject = new PersonId('549u9fdh-vfh838yt-fh8yf83-fj8fh8', 'Billy D. Intern');

        parent::setUpBeforeClass();
    }

}