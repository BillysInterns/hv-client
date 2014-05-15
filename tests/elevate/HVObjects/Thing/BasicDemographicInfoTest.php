<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Thing;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\BasicDemographicInfo;
use elevate\HVObjects\Thing\DataXML\BasicDemographicInfoDataXML;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInfoType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Language;

class BasicDemographicInfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Thing/BasicDemographicInfo.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\BasicDemographicInfo';

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

        $dataXML = new BasicDemographicInfoDataXML($basicDemographicInfoType, $common);

        self::$testObject = new BasicDemographicInfo($dataXML);
        parent::setUpBeforeClass();
    }
} 