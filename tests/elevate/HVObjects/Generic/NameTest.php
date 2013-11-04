<?php

/**
 * @author arkzero
 */
namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Name;

class NameTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . '/../SampleXML/Generic/Name.xml';
        self::$objectNamespace = 'elevate\HVObjects\Generic\Name';

        $titleCode = new CodedValue('1337', 'Title', array('Title'), array('Version 117'));
        $title     = new CodableValue("Dr.", array($titleCode));

        $suffixCode = new CodedValue('9', 'Suffix', array('Suffix'), array('Version 1'));
        $suffix     = new CodableValue('IX', array($suffixCode));

        self::$testObject = new Name(
            'Dr. Billy D Intern IX', $title, 'Billy', 'D', 'Intern', $suffix
        );

        parent::setUpBeforeClass();
    }

}