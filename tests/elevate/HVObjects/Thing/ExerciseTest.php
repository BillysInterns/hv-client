<?php
/**
 * Created by PhpStorm.
 * User: ofields
 * Date: 4/27/14
 * Time: 10:16 AM
 */

namespace elevate\test\HVObjects\Thing;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\StructuredApproxDate;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Display;
use elevate\HVObjects\Generic\LengthValue;
use elevate\HVObjects\Generic\StructuredMeasurement;
use elevate\HVObjects\Thing\DataXML\ExerciseDataXML;
use elevate\HVObjects\Thing\DataXML\Type\Exercise\StructuredNameValue;
use elevate\HVObjects\Thing\DataXML\Type\ExerciseType;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Thing\Exercise;
use elevate\HVObjects\Generic\Common;

class ExerciseTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/Exercise.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\Exercise';

        $exerciseTime = new Time('0', '0', '0');
        $exerciseDate = new ApproxDate('2014', '3', '14');
        $structuredApproxExerciseDate = new StructuredApproxDate($exerciseDate, $exerciseTime);
        $exerciseDateTime = new ApproxDateTime($structuredApproxExerciseDate, null);

        $activity = new CodableValue('Daily Summary', array());
        $exerciseType = new ExerciseType($exerciseDateTime, $activity);

        // Save the distance to go along with this
        $distance = new LengthValue(2254, new Display('miles', 1.4));
        $exerciseType->setDistance($distance);

        // Define the value for this detail
        $detailName = new CodedValue('Steps_count','exercise-detail-names', array('wc'), array('1') );

        // Define the measurement, steps
        $detailCodedeVal = new CodedValue('Steps','exercise-units', array('wc'), array('1'));
        $stucturedValue  = new StructuredMeasurement('3143', new CodableValue('Steps', array($detailCodedeVal)) );

        // Create some details to go along with this exercise...
        $structuredNameValue = new StructuredNameValue($detailName, $stucturedValue);


        // Add the exercise detail
        $exerciseType->addDetail($structuredNameValue);

        $common = new Common('Exercise Note', 'Exercise Source', 'Exercise Tag');

        $exerciseDataXML = new ExerciseDataXML($exerciseType, $common);

        self::$testObject = new Exercise($exerciseDataXML);

        parent::setUpBeforeClass();

    }
} 