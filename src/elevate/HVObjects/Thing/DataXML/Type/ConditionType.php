<?php
/**
 * @author arkzero
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
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


/** @XmlRoot("condition") */
class ConditionType
{

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;
    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("onset-date")
     */
    protected $onsetDate;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * SerializedName("status")
     */
    protected $status;
    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
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
    public function __construct(
        CodableValue $name = NULL,
        ApproxDateTime $onsetDate = NULL,
        CodableValue $status = NULL,
        ApproxDateTime $stopDate = NULL,
        $stopReason = NULL
    )
    {
        $this->name       = $name;
        $this->onsetDate  = $onsetDate;
        $this->status     = $status;
        $this->stopDate   = $stopDate;
        $this->stopReason = $stopReason;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $onsetDate
     */
    public function setOnsetDate($onsetDate)
    {
        $this->onsetDate = $onsetDate;
    }

    /**
     * @return mixed
     */
    public function getOnsetDate()
    {
        return $this->onsetDate;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $stopDate
     */
    public function setStopDate($stopDate)
    {
        $this->stopDate = $stopDate;
    }

    /**
     * @return mixed
     */
    public function getStopDate()
    {
        return $this->stopDate;
    }

    /**
     * @param mixed $stopReason
     */
    public function setStopReason($stopReason)
    {
        $this->stopReason = $stopReason;
    }

    /**
     * @return mixed
     */
    public function getStopReason()
    {
        return $this->stopReason;
    }

}