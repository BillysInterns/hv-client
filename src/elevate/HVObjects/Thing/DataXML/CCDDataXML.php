<?php


namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\MaxDepth;
use JMS\Serializer\Annotation\AccessorOrder;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\Type\FileType;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/**
 * Class CCDDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"ClinicalDocument", "common"})
 */
class CCDDataXML extends DataXML
{

    /**
     * @Type("rawxml")
     * @SerializedName("ClinicalDocument")
     */
    protected $ClinicalDocument;

    public function __construct($ClinicalDocument = NULL, Common $common = NULL)
    {
        $this->ClinicalDocument = $ClinicalDocument;
        parent::__construct($common);
    }

    public function getCCD()
    {
        return $this->ClinicalDocument;
    }

    /**
     * @param mixed $ClinicalDocument
     */
    public function setCCD($ClinicalDocument)
    {
        $this->ClinicalDocument = $ClinicalDocument;
        return $this;
    }

}