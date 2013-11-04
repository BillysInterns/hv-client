<?php

/**
 * @author ofields
 */

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
abstract class DataXML
{

    /**
     * @Type("elevate\HVObjects\Generic\Common")
     * @SerializedName("common")
     */
    protected $common = NULL;

    /**
     * @param Common $common
     */
    public function __construct(Common $common = NULL)
    {
        $this->common = $common;
    }
}