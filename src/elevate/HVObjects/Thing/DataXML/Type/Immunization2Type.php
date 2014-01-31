<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:58 PM
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Prescription;
use elevate\HVObjects\Generic\GeneralMeasurement;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\Date\ApproxDate;
use elevate\HVObjects\Generic\Person;

/** @XmlRoot("immunization") */
class Immunization2Type
{
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("administration-date")
     */
    protected $administrationDate;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("administrator")
     */
    protected $administrator;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("manufacturer")
     */
    protected $manufacturer;

    /**
     * @Type("string")
     * @SerializedName("lot")
     */
    protected $lot;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("route")
     */
    protected $route;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("expiration-date")
     */
    protected $expirationDate;

    /**
     * @Type("string")
     * @SerializedName("sequence")
     */
    protected $sequence;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("anatomic-surface")
     */
    protected $anatomicSurface;

    /**
     * @Type("string")
     * @SerializedName("adverse-event")
     */
    protected $adverseEvent;

    /**
     * @Type("string")
     * @SerializedName("consent")
     */
    protected $consent;

    /*
    * @param ApproxDateTime $administrationDate
    * @param Person $administrator
    * @param CodableValue $anatomicSurface
    * @param ApproxDate $expirationDate
    * @param CodableValue $manufacturer
    * @param CodableValue $name
    * @param CodableValue $route
    */
    function __construct(
                         ApproxDateTime $administrationDate = NULL,
                         Person $administrator = NULL,
                         $adverseEvent = NULL,
                         CodableValue $anatomicSurface = NULL,
                         $consent = NULL,
                         ApproxDate $expirationDate = NULL,
                         $lot = NULL,
                         CodableValue $manufacturer = NULL,
                         CodableValue $name = NULL,
                         CodableValue $route = NULL,
                         $sequence
    )
    {
        $this->administrationDate = $administrationDate;
        $this->administrator = $administrator;
        $this->adverseEvent = $adverseEvent;
        $this->anatomicSurface = $anatomicSurface;
        $this->consent = $consent;
        $this->expirationDate = $expirationDate;
        $this->lot = $lot;
        $this->manufacturer = $manufacturer;
        $this->name = $name;
        $this->route = $route;
        $this->sequence = $sequence;
    }

    /**
     * @param mixed $administrationDate
     */
    public function setAdministrationDate($administrationDate)
    {
        $this->administrationDate = $administrationDate;
    }

    /**
     * @return mixed
     */
    public function getAdministrationDate()
    {
        return $this->administrationDate;
    }

    /**
     * @param mixed $administrator
     */
    public function setAdministrator($administrator)
    {
        $this->administrator = $administrator;
    }

    /**
     * @return mixed
     */
    public function getAdministrator()
    {
        return $this->administrator;
    }

    /**
     * @param mixed $adverseEvent
     */
    public function setAdverseEvent($adverseEvent)
    {
        $this->adverseEvent = $adverseEvent;
    }

    /**
     * @return mixed
     */
    public function getAdverseEvent()
    {
        return $this->adverseEvent;
    }

    /**
     * @param mixed $anatomicSurface
     */
    public function setAnatomicSurface($anatomicSurface)
    {
        $this->anatomicSurface = $anatomicSurface;
    }

    /**
     * @return mixed
     */
    public function getAnatomicSurface()
    {
        return $this->anatomicSurface;
    }

    /**
     * @param mixed $consent
     */
    public function setConsent($consent)
    {
        $this->consent = $consent;
    }

    /**
     * @return mixed
     */
    public function getConsent()
    {
        return $this->consent;
    }

    /**
     * @param mixed $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $lot
     */
    public function setLot($lot)
    {
        $this->lot = $lot;
    }

    /**
     * @return mixed
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
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
     * @param mixed $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }
} 