<?php

namespace elevate\HVObjects\Thing\DataXML\Type;

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
}