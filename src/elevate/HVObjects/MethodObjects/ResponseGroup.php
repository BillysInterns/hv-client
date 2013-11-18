<?php

namespace elevate\HVObjects\MethodObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use elevate\HVObjects\Thing;

/** @XmlRoot("group") */
class ResponseGroup 
{
    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("name")
     */
    private $name = NULL;

    /**
     * @Type("array<elevate\HVObjects\Thing\Thing>")
     * @XmlList(inline=true, entry="thing")
     */
    private $things = NULL;

    function __construct($name, $things)
    {
        $this->name = $name;
        $this->things = $things;
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
     * @param mixed $things
     */
    public function setThings($things)
    {
        $this->things = $things;
    }

    /**
     * @return mixed
     */
    public function getThings()
    {
        return $this->things;
    }



}