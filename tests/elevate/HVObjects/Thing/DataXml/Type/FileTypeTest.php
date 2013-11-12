<?php
namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\DataXML\Type\FileType;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;


class FileTypeTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/File.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\FileType';

        $name = "abcdefg";

        $size = 20;

        $nameCode = new CodedValue('154', 'SomeFile', array('Some File'), array('Version 1'));
        $contentType = new CodableValue("Some File", array($nameCode));

        self::$testObject = new FileType($contentType, $name, $size);
        parent::setUpBeforeClass();

    }
}
