<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 1/9/14
 * Time: 8:58 AM
 */

namespace elevate\test\HVObjects\Thing;


use elevate\HVObjects\Thing\DataXML\QuestionAnswerDataXML;
use elevate\HVObjects\Thing\QuestionAnswer;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Common;

class QuestionAnswerTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../SampleXML/Thing/QuestionAnswer.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\QuestionAnswer';

        $codes1 = new CodedValue('Question1', 'Question2');
        $question = new CodableValue('Question',array($codes1));

        $codes2 = new CodedValue('Choice1', 'Choice2');
        $answerChoices = new CodableValue('Choice',array($codes2));



        $questionType = new QuestionAnswerType(array($question),array($answerChoices));

        $common = new Common('QuestionAnswer Note', 'QuestionAnswer Test', 'Some tags');
        $questionDataXML = new QuestionAnswerDataXML($questionType, $common);

        self::$testObject = new QuestionAnswer($questionDataXML);
        parent::setUpBeforeClass();
    }

}
 