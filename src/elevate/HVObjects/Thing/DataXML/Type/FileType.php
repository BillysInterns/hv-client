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

    function __construct($contentType = NULL, $name = NULL, $size = NULL)
    {
        $this->contentType = $contentType;
        $this->name = $name;
        $this->size = $size;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return CodableValue
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

}