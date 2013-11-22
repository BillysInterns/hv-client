<?php

/**
 * @author arkzero
 */

namespace elevate\HVObjects\Thing\DataXML;

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
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\ConditionType;

class ConditionDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\ConditionType")
     * @SerializedName("condition")
     */
    protected $condition;

    public function __construct(ConditionType $condition = NULL, Common $common = NULL)
    {
        $this->condition = $condition;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     */
    public function setType($condition)
    {
        $this->condition = $condition;
        return $this;
    }
}
