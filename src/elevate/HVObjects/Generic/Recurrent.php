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


class Recurrent
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


}