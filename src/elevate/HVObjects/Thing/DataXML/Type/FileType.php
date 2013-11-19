<?php


namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;

use elevate\HVObjects\Generic\CodableValue;

/** @XmlRoot("file") */
class FileType
{

    /**
     * @Type("string")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("integer")
     * @SerializedName("size")
     */
    protected $size;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("content-type")
     */
    protected $contentType;

    function __construct($contentType, $name, $size)
    {
        $this->contentType = $contentType;
        $this->name = $name;
        $this->size = $size;
    }

}