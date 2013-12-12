<?php

/**
 * @author ofields
 */

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\DataXML;

/**
 * Class QuestionAnswer
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"question", "common"})
 */
class QuestionAnswer extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\QuestionAnswer")
     * @SerializedName("question-answer")
     */
    protected $question;

    public function getType()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setType($question)
    {
        $this->question = $question;
        return $this;
    }


}