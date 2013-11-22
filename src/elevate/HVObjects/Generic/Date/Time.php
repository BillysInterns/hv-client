<?php

/**
 * @author troussos
 */

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


class Time {

    /**
     * @Type("integer")
     * @SerializedName("h")
     */
    protected $hour;

    /**
     * @Type("integer")
     * @SerializedName("m")
     */
    protected $minute;

    /**
     * @Type("integer")
     * @SerializedName("s")
     */
    protected $second;

    /**
     * @Type("integer")
     * @SerializedName("f")
     */
    protected $milliseconds;

    /**
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @param int $milliseconds
     */
    function __construct($hour = NULL, $minute = NULL, $second = NULL, $milliseconds = 0)
    {
        $this->hour         = $hour;
        $this->milliseconds = $milliseconds;
        $this->minute       = $minute;
        $this->second       = $second;
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $milliseconds
     */
    public function setMilliseconds($milliseconds)
    {
        $this->milliseconds = $milliseconds;
    }

    /**
     * @return mixed
     */
    public function getMilliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * @param mixed $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param mixed $second
     */
    public function setSecond($second)
    {
        $this->second = $second;
    }

    /**
     * @return mixed
     */
    public function getSecond()
    {
        return $this->second;
    }



}