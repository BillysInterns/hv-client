<?php

/**
 * @author troussos
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
use elevate\HVObjects\Thing\DataXML\Type\WeightType;

class WeightDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\WeightType")
     * @SerializedName("weight")
     */
    protected $weight;

    public function __construct(WeightType $weight, Common $common = NULL)
    {
        $this->weight = $weight;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setType($weight)
    {
        $this->weight = $weight;
        return $this;
    }

}
