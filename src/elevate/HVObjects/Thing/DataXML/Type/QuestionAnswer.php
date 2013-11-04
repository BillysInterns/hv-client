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
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("question-answer") */
class QuestionAnswer
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

}