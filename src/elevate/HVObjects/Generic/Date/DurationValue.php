<?php

/*
* @author Sumit
*/
namespace elevate\HVObjects\Generic\Date;

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

use elevate\HVObjects\Generic\Date\ApproxDateTime;


/** @XmlRoot("duration-value") */
class DurationValue
{

	/**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("start-date")
     */
	protected $startDate;

	/**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("end-date")
     */
	protected $endDate;

    function __construct($endDate, $startDate)
    {
        $this->endDate = $endDate;
        $this->startDate = $startDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }


}