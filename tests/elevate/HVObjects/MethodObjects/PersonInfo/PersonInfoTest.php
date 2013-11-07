<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:58 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;

use elevate\HVObjects\MethodObjects\PersonInfo\Culture;
use elevate\HVObjects\MethodObjects\PersonInfo\PersonInfo;
use elevate\HVObjects\MethodObjects\PersonInfo\Location;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\Record;

class PersonInfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/PersonInfo.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\PersonInfo';

        $record1 = new Record(
            'Lord Varys',
            '97cb6d50-8c8e-4aff-8818-483efdfed7d5',
            TRUE,
            1,
            "Self",
            '9999-12-31T23:59:59.999Z',
            NULL,
            "Bryan",
            "Active",
            '2013-05-28T13:52:01.097Z',
            "4294967296",
            "4557031",
            "NoActionRequired",
            NULL,
            "240623",
            "US",
            "NJ",
            '2013-08-21T17:33:51.623Z'
        );

        $record2 = new Record(
            'Tyrion Lanister',
            '362cf065-e7de-433d-8eaa-eb5f5c4fb69b',
            TRUE,
            5,
            "Child",
            '9999-12-31T23:59:59.999Z',
            NULL,
            "Tyrion",
            "Active",
            '2013-06-25T17:08:33.983Z',
            "4294967296",
            "58709",
            "NoActionRequired",
            NULL,
            "243084",
            "US",
            "NJ",
            '2013-08-21T17:33:52.183Z'
        );

        $records = array($record1, $record2);
        $culture = new Culture('en-GB');
        $location = new Location('US');

        self::$testObject = new PersonInfo(
            '3933614a-92bc-4da5-95c0-6085f7aef4aa',
            'Billy D Intern',
            '97cb6d50-8c8e-4aff-8818-483efdfed7d5',
            NULL,
            $records,
            $culture,
            $culture,
            $location
        );
        parent::setUpBeforeClass();
    }
}