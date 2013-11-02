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
     * @param $year
     * @param $month
     * @param $day
     */
    public function __construct(
        $year,
        $month,
        $day
    )
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

}