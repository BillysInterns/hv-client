<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 1:28 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\HVObjects;

use elevate\HVObjects;


class ConditionTest extends \PHPUnit_Framework_testCase{

    public function testSerialize ()
    {
        // Name
        $codedName = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
        $codableName = new CodableValue('name', $codedName);

        // Onset-date

    }

}