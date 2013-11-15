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
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("data-xml") */
class QuestionAnswer extends elevate\HVObjects\Generic\DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\Type\QuestionAnswer")
     * @SerializedName("question-answer")
     */
    protected $question;

}