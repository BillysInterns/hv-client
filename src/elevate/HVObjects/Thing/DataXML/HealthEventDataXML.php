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
use elevate\HVObjects\Thing\DataXML\Type\HealthEventType;

class HealthEventDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\HealthEventType")
     * @SerializedName("health-event")
     */
    protected $heatlhEvent;

    public function __construct(HealthEventType $heatlhEvent = NULL, Common $common = NULL)
    {
        $this->heatlhEvent = $heatlhEvent;
        parent::__construct($common);
        return $this;
    }

    /**
     * @return HealthEventType
     */
    public function getType()
    {
        return $this->heatlhEvent;
    }

    /**
     * @param $heatlhEvent
     *
     * @return $this
     */
    public function setType($heatlhEvent)
    {
        $this->heatlhEvent = $heatlhEvent;
        return $this;
    }


}
