<?php
/**
* @author - Sumit
*/

namespace elevate\test\HVObjects\Thing;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\BasicDemographicInformationv2;
use elevate\HVObjects\Thing\DataXML\BasicDemographicInformationv2DataXML;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInformationv2Type;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\Language;

class BasicDemographicInfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Thing/BasicDemographicInformationv2.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Thing\BasicDemographicInformationv2';

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

        $dataXML = new BasicDemographicInformationv2DataXML($basicDemographicInfoType, $common);

        self::$testObject = new BasicDemographicInformationv2($dataXML);
        parent::setUpBeforeClass();
    }
} 