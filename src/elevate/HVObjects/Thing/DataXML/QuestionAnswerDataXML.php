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

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType;

/**
 * Class QuestionAnswer
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"question", "common"})
 */
class QuestionAnswerDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\QuestionAnswerType")
     * @SerializedName("question-answer")
     */
    protected $questionType;

    function __construct(QuestionAnswerType $questionType, Common $common = NULL)
    {
        $this->questionType = $questionType;
        $this->common = $common;
    }


}