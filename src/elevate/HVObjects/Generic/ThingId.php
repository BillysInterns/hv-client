<?php
/**
* @author - troussos
*/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("thing-id") */
class ThingId
{
    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("version-stamp")
     */
    protected $version;

    /**
     * @XmlValue
     * @Type("string")
     */
    protected $thingId;

    function __construct($thingId = NULL, $version = NULL)
    {
        $this->thingId = $thingId;
        $this->version = $version;
        return $this;
    }

    /**
     * @param $thingId
     *
     * @return $this
     */
    public function setThingId($thingId)
    {
        $this->thingId = $thingId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThingId()
    {
        return $this->thingId;
    }

    /**
     * @param $version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }
}