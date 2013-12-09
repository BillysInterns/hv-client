<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\EmergencyOrProviderContactType;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

class EmergencyOrProviderContactDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\EmergencyOrProviderContactType")
     * @SerializedName("person")
     */
    protected $emergencyOrProviderContactType;

    public function __construct(
        EmergencyOrProviderContactType $emergencyOrProviderContactType = NULL,
        Common $common = NULL
    )
    {
        $this->emergencyOrProviderContactType = $emergencyOrProviderContactType;
        parent::__construct($common);
    }

    /**
     * @param $emergencyOrProviderContactType
     *
     * @return $this
     */
    public function setType($emergencyOrProviderContactType)
    {
        $this->emergencyOrProviderContactType = $emergencyOrProviderContactType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->emergencyOrProviderContactType;
    }


}