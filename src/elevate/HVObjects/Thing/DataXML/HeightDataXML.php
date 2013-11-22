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
use elevate\HVObjects\Thing\DataXML\Type\HeightType;

class HeightDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\HeightType")
     * @SerializedName("height")
     */
    protected $height;

    public function __construct(HeightType $height = NULL, Common $common = NULL)
    {
        $this->height = $height;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setType($height)
    {
        $this->height = $height;
        return $this;
    }


}
