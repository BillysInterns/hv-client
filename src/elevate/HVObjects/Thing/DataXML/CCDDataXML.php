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
     * @var \SimpleXMLElement
     * @Type("SimpleXMLElement")
     * @SerializedName("ClinicalDocument")
     */
    protected $ClinicalDocument;

    /**
     * @param \SimpleXMLElement $ClinicalDocument
     * @param Common            $common
     */
    public function __construct(\SimpleXMLElement $ClinicalDocument = NULL, Common $common = NULL)
    {
        $this->ClinicalDocument = $ClinicalDocument;
        parent::__construct($common);
    }

    /**
     * @param \SimpleXMLElement $ClinicalDocument
     */
    public function setClinicalDocument($ClinicalDocument)
    {
        $this->ClinicalDocument = $ClinicalDocument;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getClinicalDocument()
    {
        return $this->ClinicalDocument;
    }


}