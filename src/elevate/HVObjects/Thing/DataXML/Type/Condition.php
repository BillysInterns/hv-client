<?php

namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\DateTime;
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


<<<<<<< HEAD
/** @XmlRoot("condition") */
class Condition{
=======
/** @XmlRoot("common") */
class Condition
{
>>>>>>> 70813b0d0e5ed300c26949da64dc9aad669fe904

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;
    /**
     * @Type("elevate\HVObjects\Date\DateTime")
     * @SerializedName("onset-date")
     */
    protected $onsetDate;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * SerializedName("status")
     */
    protected $status;
    /**
     * @Type("elevate\HVObjects\Date\DateTime")
     * @SerializedName("stop-date")
     */
    protected $stopDate;
    /**
     * @Type("string")
     * @SerializedName("stop-reason")
     */
    protected $stopReason;

    /**
     * @param CodableValue $name
     * @param DateTime     $onsetDate
     * @param CodableValue $status
     * @param DateTime     $stopDate
     * @param null         $stopReason
     */
    function __construct(
        CodableValue $name = NULL,
        DateTime $onsetDate = NULL,
        CodableValue $status = NULL,
        DateTime $stopDate = NULL,
        $stopReason = NULL
    )
    {
        $this->name       = $name;
        $this->onsetDate  = $onsetDate;
        $this->status     = $status;
        $this->stopDate   = $stopDate;
        $this->stopReason = $stopReason;
    }

}