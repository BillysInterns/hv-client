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
class Medication
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

    private $dose

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
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("dose")
     */
    private $amountPrescribed;

    private $doseValue;

    private $doseUnit;

    private $strengthValue;

    private $strengthUnit;

    private $frequency;

    private $route;

    private $duration;

    private $durationUnit;

    private $refils;

    private $refilsLeft;

    private $daysSupply;

    private $prescriptionDuration;

    private $instructions;

    private $substitutionPermitted;

    private $pharmacy;

    private $prescriptionNumber;



}