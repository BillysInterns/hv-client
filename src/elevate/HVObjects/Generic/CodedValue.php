<?php


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
        $this->value = $value;
        $this->type = $type;
        $this->families = $families;
        $this->versions = $versions;
    }

}