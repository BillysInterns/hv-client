<?php


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
use elevate\HVObjects\Generic\DataXML;


/** @XmlRoot("data-xml") */
class QuestionAnswer extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\Type\QuestionAnswer")
     * @SerializedName("question-answer")
     */
    protected $question;

}