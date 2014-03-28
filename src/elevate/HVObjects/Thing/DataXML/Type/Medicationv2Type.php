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

use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Prescription;
use elevate\HVObjects\Generic\GeneralMeasurement;
use elevate\HVObjects\Generic\Date\ApproxDateTime;

/** @XmlRoot("medication") */
class Medicationv2Type
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
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("date-started")
     */
    private $dateStarted;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
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

    function __construct(
        $name = NULL,
        $dateDiscontinued = NULL,
        $dateStarted = NULL,
        $dose = NULL,
        $frequency = NULL,
        $genericName = NULL,
        $indication = NULL,
        $prescribed = NULL,
        $prescription = NULL,
        $route = NULL,
        $strength = NULL
    )
    {
        $this->dateDiscontinued = $dateDiscontinued;
        $this->dateStarted = $dateStarted;
        $this->dose = $dose;
        $this->frequency = $frequency;
        $this->genericName = $genericName;
        $this->indication = $indication;
        $this->name = $name;
        $this->prescribed = $prescribed;
        $this->prescription = $prescription;
        $this->route = $route;
        $this->strength = $strength;
    }

    /**
     * @param mixed $dateDiscontinued
     */
    public function setDateDiscontinued($dateDiscontinued)
    {
        $this->dateDiscontinued = $dateDiscontinued;
    }

    /**
     * @return mixed
     */
    public function getDateDiscontinued()
    {
        return $this->dateDiscontinued;
    }

    /**
     * @param mixed $dateStarted
     */
    public function setDateStarted($dateStarted)
    {
        $this->dateStarted = $dateStarted;
    }

    /**
     * @return mixed
     */
    public function getDateStarted()
    {
        return $this->dateStarted;
    }

    /**
     * @param mixed $dose
     */
    public function setDose($dose)
    {
        $this->dose = $dose;
    }

    /**
     * @return mixed
     */
    public function getDose()
    {
        return $this->dose;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $genericName
     */
    public function setGenericName($genericName)
    {
        $this->genericName = $genericName;
    }

    /**
     * @return mixed
     */
    public function getGenericName()
    {
        return $this->genericName;
    }

    /**
     * @param mixed $indication
     */
    public function setIndication($indication)
    {
        $this->indication = $indication;
    }

    /**
     * @return mixed
     */
    public function getIndication()
    {
        return $this->indication;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $prescribed
     */
    public function setPrescribed($prescribed)
    {
        $this->prescribed = $prescribed;
    }

    /**
     * @return mixed
     */
    public function getPrescribed()
    {
        return $this->prescribed;
    }

    /**
     * @param mixed $prescription
     */
    public function setPrescription($prescription)
    {
        $this->prescription = $prescription;
    }

    /**
     * @return mixed
     */
    public function getPrescription()
    {
        return $this->prescription;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }


}