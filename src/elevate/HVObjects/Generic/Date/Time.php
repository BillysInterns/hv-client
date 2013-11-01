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
    function __construct($hour, $minute, $second, $milliseconds = 0)
    {
        $this->hour         = $hour;
        $this->milliseconds = $milliseconds;
        $this->minute       = $minute;
        $this->second       = $second;
    }

}