<?php

/**
 * @author jonfor
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

/** @XmlRoot("school") */
class SchoolType
{
    /**
     * @Type("string")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("string")
     * @SerializedName("type")
     */
    protected $type;

    /**
     * @Type("array<string>")
     * @XmlList(inline=true, entry="specialty")
     */
    protected $specialty;

    /**
     * @Type("boolean")
     * @SerializedName("current")
     */
    protected $current;

    public function __construct($name = NULL, $type = NULL, $specialty = array(), $current = NULL)
    {
        $this->name = $name;
        $this->type = $type;
        $this->specialty = $specialty;
        $this->current = $current;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $specialty
     */
    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;
    }

    /**
     * @return mixed
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return boolean
     */
    public function getCurrent()
    {
        return $this->current;
    }


}