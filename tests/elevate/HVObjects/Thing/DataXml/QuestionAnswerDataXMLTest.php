<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 1/8/14
 * Time: 4:30 PM
 */

namespace elevate\test\HVObjects\Thing\DataXml;

use elevate\HVObjects\Thing\DataXML\QuestionAnswerDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Common;

class QuestionAnswerDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/QuestionAnswer.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXml\QuestionAnswerDataXML';

        $codes1 = new CodedValue('Question1', 'Question2');
        $question = new CodableValue('Question',array($codes1));

        $codes2 = new CodedValue('Choice1', 'Choice2');
        $answerChoices = new CodableValue('Choice',array($codes2));



       $questionType = new QuestionAnswerType(array($question),array($answerChoices));

        $common = new Common('QuestionAnswer Note', 'QuestionAnswer Test', 'Some tags');
        self::$testObject = new QuestionAnswerDataXML($questionType, $common);
        parent::setUpBeforeClass();
    }

}
 