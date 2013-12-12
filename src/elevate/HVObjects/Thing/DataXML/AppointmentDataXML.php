<?php


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
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\Type\AppointmentType;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/**
 * Class AppointmentDataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"appointment", "common"})
 */
class AppointmentDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\AppointmentType")
     * @SerializedName("appointment")
     */
    protected $appointment;

    public function __construct(AppointmentType $appointment = NULL, Common $common = NULL)
    {
        $this->appointment = $appointment;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->appointment;
    }

    /**
     * @param mixed $appointment
     */
    public function setType($appointment)
    {
        $this->appointment = $appointment;
        return $this;
}


}