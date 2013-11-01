<?php


namespace elevate\HVObjects\GenericTypes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

class CodableValue
{

    /**
     * @Type("string")
     */
    protected $text;

    /**
     * @var array
     * @XmlList(inline=true, entry="code")
     * @Type("array<elevate\HVObjects\GenericTypes\CodedValue>")
     */
    protected $codes;

    public function __construct($text,array $codes = array())
    {
        $this->text = $text;
        $this->codes = $codes;
    }

}