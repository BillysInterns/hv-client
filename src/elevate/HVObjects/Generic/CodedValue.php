<?php

/**
 * @author troussos
 */


namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

class CodedValue
{

    /**
     * @Type("string")
     */
    protected $value;
    /**
     * @var array
     * @XmlList(inline=true, entry="family")
     * @Type("array<string>")
     */
    protected $families;
    /**
     * @Type("string")
     */
    protected $type;
    /**
     * @var array
     * @XmlList(inline=true, entry="version")
     * @Type("array<string>")
     */
    protected $versions;

    public function __construct($value, $type, array $families = array(), array $versions = array())
    {
        $this->value    = $value;
        $this->type     = $type;
        $this->families = $families;
        $this->versions = $versions;
    }

    /**
     * @param array $families
     */
    public function setFamilies($families)
    {
        $this->families = $families;
    }

    /**
     * @return array
     */
    public function getFamilies()
    {
        return $this->families;
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

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param array $versions
     */
    public function setVersions($versions)
    {
        $this->versions = $versions;
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }


}