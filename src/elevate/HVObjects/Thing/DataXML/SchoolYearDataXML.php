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
use elevate\HVObjects\Thing\DataXML\Type\SchoolYearType;

/**
 * Class SchoolYearDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 *
 * @AccessorOrder("custom", custom = {"schoolYear", "common"})
 */
class SchoolYearDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\SchoolYearType")
     * @SerializedName("school-year")
     */
    protected $schoolYear;

    function __construct(schoolYearType $schoolYear = NULL, Common $common = NULL)
    {
        $this->schoolYear = $schoolYear;
        parent::__construct($common);
    }

    /**
     * @param mixed $schoolYear
     */
    public function setType($schoolYear)
    {
        $this->schoolYear = $schoolYear;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->schoolYear;
    }
}