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

class DateTime {

    /**
     * @Type("game\XMLObjects\Types\Date\Date")
     */
    protected $date;

    /**
     * @Type("game\XMLObjects\Types\Date\Time")
     */
    protected $time;

}