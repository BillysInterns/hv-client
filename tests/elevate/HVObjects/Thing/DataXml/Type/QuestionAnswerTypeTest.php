<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 1/8/14
 * Time: 3:42 PM
 */

namespace elevate\test\HVObjects\Thing\DataXML\Type;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType;
use elevate\test\HVObjects\BaseObjectTest;

class QuestionAnswerTypeTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../../SampleXML/Thing/DataXml/Type/QuestionAnswer.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType';

        $codes1 = new CodedValue('Question1', 'Question2');
        $question = new CodableValue('Question',array($codes1));

        $codes2 = new CodedValue('Choice1', 'Choice2');
        $answerChoices = new CodableValue('Choice',array($codes2));



        self::$testObject = new QuestionAnswerType($question,array($answerChoices));
        parent::setUpBeforeClass();
    }
}
 