<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;

class CodedValueTest extends BaseObjectTest
{

    public function setUp()
    {
        $this->sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/CodedValue.xml';
        $this->objectNamespace = 'elevate\HVObjects\Generic\CodedValue';
        $this->testObject      = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        parent::setUp();
    }

}
 