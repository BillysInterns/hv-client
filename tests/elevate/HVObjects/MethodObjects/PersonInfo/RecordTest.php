<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/7/13
 * Time: 8:58 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\MethodObjects\PersonInfo;

use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\MethodObjects\PersonInfo\Record;
use DateTime;


class RecordTest extends BaseObjectTest
{
    public static function setUpBeforeClass ()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/PersonInfo/Record.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\PersonInfo\Record';

        $authExpires = new DateTime('9999-12-31T23:59:59.999Z', new \DateTimeZone('America/New_York'));
        $authExpires = $authExpires->format("DATE_ISO8601");

        $dateCreated = new DateTime('2013-05-28T13:52:01.097Z', new \DateTimeZone('America/New_York'));
        $dateCreated = $dateCreated->format("DATE_ISO8601");

        $dateUpdated = new DateTime('2013-08-21T17:33:51.623Z', new \DateTimeZone('America/New_York'));
        $dateUpdated = $dateUpdated->format('DATE_ISO8601');

        self::$testObject = new Record(
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

        parent::setUpBeforeClass();
    }
}