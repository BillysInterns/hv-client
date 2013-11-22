<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:20 PM
 */

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\Type\DeviceType;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
class DeviceDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\DeviceType")
     * @SerializedName("device")
     */
    protected $device;

    public function __construct(DeviceType $device = NULL, Common $common = NULL)
    {
        $this->device = $device;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setType($device)
    {
        $this->device = $device;
        return $this;
    }
}