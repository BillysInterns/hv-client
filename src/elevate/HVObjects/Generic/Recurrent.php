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
class Recurrent extends Extension
{
    /**
     * @Type("string")
     * @SerializedName("interval")
     */
    protected $interval;

    /**
     * @Type("string")
     * @SerializedName("end-date")
     */
    protected $endDate;


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
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
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
    public function setinterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return mixed
     */
    public function getinterval()
    {
        return $this->interval;
    }

}