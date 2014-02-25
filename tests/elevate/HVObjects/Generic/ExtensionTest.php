<?php
/*@author Jonfor */

namespace elevate\test\HVObjects\Generic;

use elevate\HVObjects\Generic\SymptomInfo;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Extension;

class ExtensionTest extends BaseObjectTest
{
    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Extension.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Extension';

        $symptomInfo = new SymptomInfo();
        $symptomInfo->setDomain('domain');
        $symptomInfo->setSubDomain('subDomain');
        $symptomInfo->setGroup('group');
        $symptomInfo->setSymptomType('symptom');


        self::$testObject = new Extension();
        self::$testObject->setSymptomInfo($symptomInfo);

        parent::setUpBeforeClass();
    }
}