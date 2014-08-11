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
 * Class CCRDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"ClinicalDocument", "common"})
 */
class CCRDataXML extends DataXML
{

    /**
     * @var \SimpleXMLElement
     * @Type("SimpleXMLElement")
     * @SerializedName("ContinuityOfCareRecord")
     */
    protected $continuityOfCareRecord;

    /**
     * @param \SimpleXMLElement $continuityOfCareRecord
     * @param Common            $common
     */
    public function __construct(\SimpleXMLElement $continuityOfCareRecord = NULL, Common $common = NULL)
    {
        $this->continuityOfCareRecord = $continuityOfCareRecord;
        parent::__construct($common);
    }

    /**
     * @param \SimpleXMLElement $continuityOfCareRecord
     */
    public function setContinuityOfCareRecord($continuityOfCareRecord)
    {
        $this->continuityOfCareRecord = $continuityOfCareRecord;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getContinuityOfCareRecord()
    {
        return $this->continuityOfCareRecord;
    }
}