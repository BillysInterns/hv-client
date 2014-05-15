<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInfoType;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\AccessorOrder;

use PhpCollection\Map;
use PhpCollection\Sequence;

use elevate\HVObjects\Thing\DataXML\DataXML;


class BasicDemographicInfoDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInfoType")
     * @SerializedName("basic")
     */
    protected $basicDemographicInfo;

    function __construct(BasicDemographicInfoType $basicDemographicInfo = NULL, Common $common = NULL)
    {
        $this->basicDemographicInfo = $basicDemographicInfo;
        parent::__construct($common);
    }

    /**
     * @param mixed $basicDemographicInfo
     */
    public function setBasicDemographicInfo($basicDemographicInfo)
    {
        $this->basicDemographicInfo = $basicDemographicInfo;
    }

    /**
     * @return mixed
     */
    public function getBasicDemographicInfo()
    {
        return $this->basicDemographicInfo;
    }


} 