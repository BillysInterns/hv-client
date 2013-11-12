<?php
/**
 * @author Sumit
 */

namespace elevate\test\HVObjects\Thing\DataXml;


use elevate\HVObjects\Thing\DataXML\FileDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\FileType;
use elevate\HVObjects\Generic\Common;


class FileDataXMLTest extends BaseObjectTest
{
	public static function setUpBeforeClass()
    {
		self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/File.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\FileDataXML';

        $name = "abcdefg";

        $size = 20;

        $nameCode = new CodedValue('154', 'SomeFile', array('Some File'), array('Version 1'));
        $contentType = new CodableValue("Some File", array($nameCode));

        $fileType = new FileType($contentType, $name, $size);

        $common = new Common('File Note', 'File Source', 'fileTag');
        self::$testObject = new FileDataXML($fileType, $common);

        parent::setUpBeforeClass();


    }
}