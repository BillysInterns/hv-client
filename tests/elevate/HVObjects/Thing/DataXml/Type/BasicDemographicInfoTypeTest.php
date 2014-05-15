<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 5/14/14
 * Time: 3:50 PM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Language;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInformationv2Type;
use elevate\test\HVObjects\BaseObjectTest;

class BasicDemographicInfoTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath   = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/BasicDemographicInformationv2Type.xml";
        self::$objectNamespace =
            'elevate\HVObjects\Thing\DataXml\Type\BasicDemographicInformationv2Type';

        $birthYear = '1999';
        $city      = 'Raritan';
        $country   = new CodableValue('USA');
        $firstDow  = 'firstDow';
        $gender    = 'm';
        $language  = new Language(new CodableValue('English'), 1);
        $postcode  = '123455';
        $state     = new CodableValue('NJ');

        self::$testObject = new BasicDemographicInformationv2Type
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

        parent::setUpBeforeClass();
    }

}
 