<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

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