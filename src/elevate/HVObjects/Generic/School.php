<?php

/**
 * @author jonfor
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

class School
{
    /**
     * @Type("string")
     */
    protected $name;

    /**
     * @Type("string")
     */
    protected $type;

    /**
     * @Type("array<string>")
     * @XmlList(inline=true, entry="related-thing")
     */
    protected $specialty;

    public function __construct($name = NULL, $type = NULL, $specialty = array())
    {
        $this->name = $name;
        $this->type = $type;
        $this->specialty = $specialty;
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
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}