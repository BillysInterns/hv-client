<?php

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
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Date\DurationValue;
use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("appointment") */
class AppointmentType
{
	/**
	* @Type("elevate\HVObjects\Generic\Date\DateTime")
	* @SerializedName("when")
	*/
	protected $when;

	/**
	* @Type("elevate\HVObjects\Generic\Date\DurationValue")
	* @SerializedName("duration")
	*/
	protected $duration;

	/**
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("service")
	*/
	protected $service;

	/**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("clinic")
     */
	protected $clinic;

	/**
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("specialty")
	*/
	protected $specialty;

	/**
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("status")
	*/
	protected $status;

	/**
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("care-class")
	*/
	protected $careClass;

    public function __construct(
                        $careClass = NULL,
                        $clinic = NULL,
                        $duration = NULL,
                        $service = NULL,
                        $specialty = NULL,
                        $status = NULL,
                        DateTime $when = NULL
                )
    {
        $this->careClass = $careClass;
        $this->clinic = $clinic;
        $this->duration = $duration;
        $this->service = $service;
        $this->specialty = $specialty;
        $this->status = $status;
        $this->when = $when;
    }

    /**
     * @param mixed $careClass
     */
    public function setCareClass($careClass)
    {
        $this->careClass = $careClass;
    }

    /**
     * @return mixed
     */
    public function getCareClass()
    {
        return $this->careClass;
    }

    /**
     * @param mixed $clinic
     */
    public function setClinic($clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * @return mixed
     */
    public function getClinic()
    {
        return $this->clinic;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $specialty
     */
    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
    }

    /**
     * @return mixed
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $when
     */
    public function setWhen($when)
    {
        $this->when = $when;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }

}