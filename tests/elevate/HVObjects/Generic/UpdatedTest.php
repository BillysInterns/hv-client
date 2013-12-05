<?php
/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\Updated;
use elevate\HVObjects\Generic\PersonId;
use elevate\test\HVObjects\BaseObjectTest;

class UpdatedTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Updated.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Updated';

        $personId = new PersonId('7893985-457935-457935-57395793', 'Billy D. Intern');

        self::$testObject      = new Updated('Updated', $personId, '2013-12-04T20:56:03.993Z');
        parent::setUpBeforeClass();
    }
}