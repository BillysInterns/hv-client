<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:57 PM
 */

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Thing\DataXML\Type\Immunizationv2Type;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/**
 * Class Immunizationv2DataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"immunization", "common"})
 */
class Immunizationv2DataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\Immunizationv2Type")
     * @SerializedName("immunization")
     */
    protected $immunization;

    public function __construct(Immunizationv2Type $immunization = NULL, Common $common = NULL)
    {
        $this->immunization = $immunization;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->immunization;
    }

    /**
     * @param mixed $immunization
     */
    public function setType($immunization)
    {
        $this->immunization = $immunization;
    }
} 