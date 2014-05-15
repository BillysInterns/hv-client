<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Thing\DataXML;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\BasicDemographicInformationv2DataXML;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInformationv2Type;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Language;

class BasicDemographicInfoDataXMLTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../../SampleXML/Thing/DataXml/BasicDemographicInformationv2DataXML.xml';
        self::$objectNamespace  =
            'elevate\HVObjects\Thing\DataXml\BasicDemographicInformationv2DataXML';

        $birthYear = '1999';
        $city      = 'Raritan';
        $country   = new CodableValue('USA');
        $firstDow  = 'firstDow';
        $gender    = 'm';
        $language  = new Language(new CodableValue('English'), 1);
        $postcode  = '123455';
        $state     = new CodableValue('NJ');

        $basicDemographicInfoType = new BasicDemographicInformationv2Type
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

        self::$testObject = new BasicDemographicInformationv2DataXML($basicDemographicInfoType, $common);
        parent::setUpBeforeClass();
    }
} 