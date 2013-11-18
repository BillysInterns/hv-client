<?php
/** @author troussos **/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("display") */
class Display 
{
    /**
     * @Type("string")
     * @XmlAttribute
     */
    protected $units;

    /**
     * @XmlValue
     * @Type("string")
     */
    protected $display;

    public function __construct($units, $display)
    {
        $this->units = $units;
        $this->display = $display;
        return $this;
    }
} 