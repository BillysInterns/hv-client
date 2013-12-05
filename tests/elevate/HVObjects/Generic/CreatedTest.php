<?php
/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Created;
use elevate\HVObjects\Generic\PersonId;
use elevate\test\HVObjects\BaseObjectTest;

class CreatedTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Created.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Created';

        $personId = new PersonId('7893985-457935-457935-57395793', 'Billy D. Intern');

        self::$testObject      = new Created('Created', $personId, '2013-12-04T20:56:03.993Z');
        parent::setUpBeforeClass();
    }
}