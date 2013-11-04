<?php
/** @author troussos **/

namespace elevate\HVObjects\Generic;

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

/** @XmlRoot("weight-value") */
class WeightValue
{
    /**
     * @Type("double")
     * @SerializedName("kg")
     */
    protected $value;

    /**
     * @Type("string")
     * @SerializedName("display")
     */
    protected $display;

    /**
     * @param $value
     * @param $display
     */
    public function __construct($value, $display)
    {
        $this->value = $value;
        $this->display = $display;
    }
} 