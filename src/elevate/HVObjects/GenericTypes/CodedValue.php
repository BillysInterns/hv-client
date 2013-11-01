<?php


namespace elevate\HVObjects\GenericTypes;

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

}