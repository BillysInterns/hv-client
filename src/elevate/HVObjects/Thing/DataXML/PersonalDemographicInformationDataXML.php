<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\DataXML\Type\PersonalDemographicInformationType;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
class PersonalDemographicInformationDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\PersonalDemographicInformationType")
     * @SerializedName("personal")
     */
    protected $pdi;

    public function __construct(PersonalDemographicInformationType $pdi, Common $common = NULL)
    {
        $this->pdi = $pdi;
        parent::__construct($common);
    }
} 