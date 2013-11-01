<?php

namespace elevate\HVObjects\Generic\Date;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;


class Date {

    /**
     * @Type("integer")
     * @SerializedName("y")
     */
    protected $year;

    /**
     * @Type("integer")
     * @SerializedName("m")
     */
    protected $month;

    /**
     * @Type("integer")
     * @SerializedName("d")
     */
    protected $day;

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }


}