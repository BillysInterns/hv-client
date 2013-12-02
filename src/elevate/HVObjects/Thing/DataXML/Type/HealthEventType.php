<?php
/** @author troussos **/

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
class HealthEventType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("event")
     */
    protected $event;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("category")
     */
    protected $category;

    function __construct(DateTime $when, CodableValue $event, CodableValue $category = null)
    {
        $this->category = $category;
        $this->event    = $event;
        $this->when     = $when;
        return $this;
    }
} 