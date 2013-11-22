<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:57 PM
 */

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Thing\DataXML\Type\ImmunizationType;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
class ImmunizationDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\ImmunizationType")
     * @SerializedName("immunization")
     */
    protected $immunization;

    public function __construct(ImmunizationType $immunization = NULL, Common $common = NULL)
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
        return $this;
    }


} 