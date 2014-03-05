<?php

/**
 * @author Jonfor
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
use JMS\Serializer\Annotation\AccessorOrder;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\SchoolType;

/**
 * Class SchoolDataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"school", "common"})
 */
class SchoolDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\SchoolType")
     * @SerializedName("school")
     */
    protected $school;

    /**
     * @param SchoolType $school
     * @param Common     $common
     */
    function __construct(SchoolType $school = NULL, Common $common = NULL)
    {
        $this->school = $school;
        parent::__construct($common);
    }

    /**
     * @param mixed $school
     */
    public function setType($school)
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->school;
    }
}