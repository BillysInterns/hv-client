<?php


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

/** @XmlRoot("medication") */
class MedicationType
{
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    private $name;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("generic-name")
     */
    private $genericName;

    /**
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("dose")
     */

    private $dose;

    /**
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("strength")
     */
    private $strength;

    /**
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("frequency")
     */
    private $frequency;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("route")
     */
    private $route;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("indication")
     */
    private $indication;

    /**
     * @Type("elevate\HVObjects\Generic\ApproxDateTime")
     * @SerializedName("date-started")
     */
    private $dateStarted;

    /**
     * @Type("elevate\HVObjects\Generic\ApproxDateTime")
     * @SerializedName("date-discontinued")
     */
    private $dateDiscontinued;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("prescribed")
     */
    private $prescribed;

    /**
     * @Type("elevate\HVObjects\Generic\Prescription")
     * @SerializedName("prescription")
     */
    private $prescription;

}