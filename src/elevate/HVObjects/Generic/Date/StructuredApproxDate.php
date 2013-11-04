<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 10:02 AM
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

/** @XmlRoot("structured-approx-date") */
class StructuredApproxDate {

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("date")
     */
    protected $date;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Time")
     * @SerializedName("time")
     */
    protected $time;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("tz")
     */
    protected $tz;

    public function __construct( $date, $time, $tz )
    {
        $this->date = $date;
        $this->time = $time;
        $this->tz = $tz;
    }
} 