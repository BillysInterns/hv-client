<?php
/** @author troussos **/

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
class HealthEventType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
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

    public function __construct(ApproxDateTime $when = null, CodableValue $event = null, CodableValue $category = null)
    {
        $this->category = $category;
        $this->event    = $event;
        $this->when     = $when;
        return $this;
    }

    /**
     * @param $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param $event
     *
     * @return $this
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param $when
     *
     * @return $this
     */
    public function setWhen($when)
    {
        $this->when = $when;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }


} 