<?php

/** @author jonfor **/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\AccessorOrder;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType;
use elevate\HVObjects\Generic\Common;

/**
 * Class PersonalContactInformationDataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"personalContactInformation", "common"})
 */
class PersonalContactInformationDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\PersonalContactInformationType")
     * @SerializedName("contact")
     */
    protected $personalContactInformation;

    /**
     * @param PersonalContactInformationType $personalContactInformation
     * @param Common                         $common
     */
    public function __construct(PersonalContactInformationType $personalContactInformation = NULL, Common $common = NULL)
    {
            $this->personalContactInformation = $personalContactInformation;
            parent::__construct($common);
    }

    /**
     * @param PersonalContactInformationType $personalContactInformation
     */
    public function setType($personalContactInformation)
    {
        $this->personalContactInformation = $personalContactInformation;
    }

    /**
     * @return PersonalContactInformationType
     */
    public function getType()
    {
        return $this->personalContactInformation;
    }
}