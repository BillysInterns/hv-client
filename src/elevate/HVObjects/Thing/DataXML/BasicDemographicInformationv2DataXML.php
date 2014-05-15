<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInformationv2Type;
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


class BasicDemographicInformationv2DataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\BasicDemographicInformationv2Type")
     * @SerializedName("basic")
     */
    protected $basicDemographicInfo;

    function __construct(BasicDemographicInformationv2Type $basicDemographicInfo = NULL, Common $common = NULL)
    {
        $this->basicDemographicInfo = $basicDemographicInfo;
        parent::__construct($common);
    }

    /**
     * @param mixed $basicDemographicInfo
     */
    public function setType($basicDemographicInfo)
    {
        $this->basicDemographicInfo = $basicDemographicInfo;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->basicDemographicInfo;
    }


} 