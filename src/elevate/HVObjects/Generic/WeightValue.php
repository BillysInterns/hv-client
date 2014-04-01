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

use elevate\HVObjects\Generic\Display;

/** @XmlRoot("weight-value") */
class WeightValue
{
    /**
     * @Type("double")
     * @SerializedName("kg")
     */
    protected $value;

    /**
     * @Type("elevate\HVObjects\Generic\Display")
     * @SerializedName("display")
     */
    protected $display;

    /**
     * @param $value
     * @param $display
     */
    public function __construct($value, Display $display = NULL)
    {
        $this->value = $value;
        $this->display = $display;
        return $this;
    }

    /**
     * @param Display $display
     *
     * @return $this
     */
    public function setDisplay(Display $display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


} 