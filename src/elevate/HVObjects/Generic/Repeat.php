<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Generic;


use elevate\HVObjects\Generic\Date\ApproxDateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use elevate\HVObjects\Generic\Extension;

/**
 * @XmlRoot("repeat")
 */
class Repeat
{
    /**
     * @Type("string")
     * @SerializedName("interval")
     */
    public $interval;

    /**
     * @Type("string")
     * @SerializedName("end-date")
     */
    public $endDate;


    function __construct($endDate = NULL, $interval = NULL )
    {
        $this->endDate = $endDate;
        $this->interval = $interval;
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
     * @param mixed $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }


}