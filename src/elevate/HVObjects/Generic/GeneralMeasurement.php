<?php
/**
 * @author palsumit
 */
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

/** @XmlRoot("general-measurement") */
class GeneralMeasurement {

    /**
     * @Type("string")
     * @SerializedName("display")
     */
    protected $display;
    /**
     * @Type("elevate\HVObjects\Generic\StructuredMeasurement")
     * @SerializedName("structured")
     */
    protected $structure;


    /**
     * @param                       $display
     * @param StructuredMeasurement $structure
     */
    function __construct($display, StructuredMeasurement $structure = NULL)
    {
        $this->display   = $display;
        $this->structure = $structure;
        return $this;
    }

    /**
     * @param mixed $display
     */
    public function setDisplay($display)
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
     * @param mixed $structure
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStructure()
    {
        return $this->structure;
    }


} 