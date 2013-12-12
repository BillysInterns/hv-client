<?php


namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\Type\FileType;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/**
 * Class FileDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"file", "common"})
 */
class FileDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\FileType")
     * @SerializedName("file")
     */
    protected $file;

    public function __construct(FileType $file = NULL, Common $common = NULL)
    {
        $this->file = $file;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setType($file)
    {
        $this->file = $file;
        return $this;
    }



}