<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:22 PM
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;
use game\XMLObjects\DataXML;
use game\XMLObjects\Thing;

/** @XmlRoot("device") */
class DeviceType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("string")
     * @SerializedName("device-name")
     */
    protected $deviceName;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("vendor")
     */
    protected $vendor;

    /**
     * @Type("string")
     * @SerializedName("model")
     */
    protected $model;

    /**
     * @Type("string")
     * @SerializedName("serial-number")
     */
    protected $serialNumber;

    /**
     * @Type("string")
     * @SerializedName("anatomic-site")
     */
    protected $anatomicSite;

    /**
     * @Type("string")
     * @SerializedName("description")
     */
    protected $description;

    function __construct($anatomicSite, $description, $deviceName, $model, $serialNumber, $vendor, $when)
    {
        $this->anatomicSite = $anatomicSite;
        $this->description = $description;
        $this->deviceName = $deviceName;
        $this->model = $model;
        $this->serialNumber = $serialNumber;
        $this->vendor = $vendor;
        $this->when = $when;
    }


} 