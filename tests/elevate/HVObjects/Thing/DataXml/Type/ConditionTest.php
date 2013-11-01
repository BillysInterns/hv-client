<?php

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\test\HVObjects\BaseObjectTest;


class ConditionTest extends BaseObjectTest{

    // Name
    private $codedName;
    private $codableName;

    // Onsent-date
    private $onsetDate;
    private $onsetTime;
    private $onsetDatetime;

    // Status
    private $codedStatus;
    private $codableStatus;

    // Stop-date
    private $stopDate;
    private $stopTime;
    private $stopDatetime;

    // Stop-reasons
    private $stopReason;

    private $condition;

    public function setUp()
    {
        parent::setUp();

    }

    public function testSerialize ()
    {


    }

}