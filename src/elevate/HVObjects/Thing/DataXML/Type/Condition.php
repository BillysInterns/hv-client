<?php
/**
 * @author arkzero
 */

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


/** @XmlRoot("condition") */
class Condition
{

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;
    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("onset-date")
     */
    protected $onsetDate;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * SerializedName("status")
     */
    protected $status;
    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
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