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
use elevate\HVObjects\Generic\Date\Date;

class DateTime {

    /**
     * @var elevate\HVObjects\Generic\Date\Date
     * @Type("elevate\HVObjects\Generic\Date\Date")
     */
    protected $date;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Time")
     */
    protected $time;

    /**
     * @param $date
     * @param $time
     */
    public function __construct($date, $time)
    {
        $this->date = $date;
        $this->time = $time;
    }

}