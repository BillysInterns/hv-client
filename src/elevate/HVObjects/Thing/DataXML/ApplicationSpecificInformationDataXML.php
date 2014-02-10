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
use elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType;

/**
 * Class ApplicationSpecificInformationDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 *
 * @AccessorOrder("custom", custom = {"applicationSpecificInformation", "common"})
 */
class ApplicationSpecificInformationDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\ApplicationSpecificInformationType")
     * @SerializedName("application-specific-information")
     */
    protected $applicationSpecificInformation;

    function __construct(ApplicationSpecificInformationType $applicationSpecificInformation = NULL, Common $common = NULL)
    {
        $this->applicationSpecificInformation = $applicationSpecificInformation;
        parent::__construct($common);
    }

    /**
     * @param mixed $applicationSpecificInformation
     */
    public function setApplicationSpecificInformation($applicationSpecificInformation)
    {
        $this->applicationSpecificInformation = $applicationSpecificInformation;
    }

    /**
     * @return mixed
     */
    public function getApplicationSpecificInformation()
    {
        return $this->applicationSpecificInformation;
    }
}