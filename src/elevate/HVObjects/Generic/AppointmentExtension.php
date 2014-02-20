<?php
/**
 * @author - Sumit
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\XmlKeyValuePairs;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\AccessorOrder;
use elevate\HVObjects\Generic\Recurrent;
use elevate\HVObjects\Generic\Extension;

/**
 * @XmlRoot("extension")
 */
class AppointmentExtension extends Extension
{

    /**
     * @Type("elevate\HVObjects\Generic\Recurrent")
     * @SerializedName("repeat")
     */
    public $repeat;

    function __construct($source, $repeat)
    {
        $this->source = $source;
        $this->repeat = $repeat;
    }


}