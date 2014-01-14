<?php
/**
 * @author ofields
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("question-answer") */
class QuestionAnswerType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("question")
     */
    protected $question;
    /**
     * @var array
     * @XmlList(inline=true, entry="answer-choice")
     * @Type("array<elevate\HVObjects\Generic\CodableValue>")
     */
    protected $answerChoices;
    /**
     * @var array
     * @XmlList(inline=true, entry="answer")
     * @Type("array<elevate\HVObjects\Generic\CodableValue>")
     */
    protected $answers;

    function __construct(
        $question = NULL, $answerChoices = array(), $answers = array(), DateTime $when = NULL
    )
    {
        $this->answerChoices = $answerChoices;
        $this->answers       = $answers;
        $this->question      = $question;
        $this->when          = $when;
    }

    /**
     * @param array $answerChoices
     */
    public function setAnswerChoices($answerChoices)
    {
        $this->answerChoices = $answerChoices;
    }

    /**
     * @return array
     */
    public function getAnswerChoices()
    {
        return $this->answerChoices;
    }

    /**
     * @param array $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    /**
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $when
     */
    public function setWhen(DateTime $when)
    {
        $this->when = $when;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }


}