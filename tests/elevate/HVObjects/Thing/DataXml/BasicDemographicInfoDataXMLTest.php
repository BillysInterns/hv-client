<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Thing\DataXML;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\BasicDemographicInfoDataXML;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInfoType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Language;

class BasicDemographicInfoDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../../SampleXML/Thing/DataXml/BasicDemographicInfoDataXML.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\BasicDemographicInfoDataXML';

        $birthYear = '1999';
        $city      = 'Raritan';
        $country   = new CodableValue('USA');
        $firstDow  = 'firstDow';
        $gender    = 'm';
        $language  = new Language(new CodableValue('English'), 1);
        $postcode  = '123455';
        $state     = new CodableValue('NJ');

        $basicDemographicInfoType = new BasicDemographicInfoType
        (
            $gender,
            $birthYear,
            $city,
            $country,
            $firstDow,
            $language,
            $postcode,
            $state
        );

        $common = new Common('Sleep Session Note', 'Unit Test', 'Some tags');

        self::$testObject = new BasicDemographicInfoDataXML($basicDemographicInfoType, $common);
        parent::setUpBeforeClass();
    }
} 