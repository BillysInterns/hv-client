<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\AccessorOrder;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\DataXML\Type\PersonalDemographicInformationType;
use elevate\HVObjects\Generic\Common;


/**
 * Class PersonalDemographicInformationDataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"personal", "common"})
 */
class PersonalDemographicInformationDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\PersonalDemographicInformationType")
     * @SerializedName("personal")
     */
    protected $pdi;

    public function __construct(PersonalDemographicInformationType $pdi = NULL, Common $common = NULL)
    {
        $this->pdi = $pdi;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->pdi;
    }

    /**
     * @param mixed $pdi
     */
    public function setType($pdi)
    {
        $this->pdi = $pdi;
        return $this;
    }


}

