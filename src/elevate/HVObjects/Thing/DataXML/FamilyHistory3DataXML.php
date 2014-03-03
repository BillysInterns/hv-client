<?php

/** author jonfor */

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Thing\DataXML\Type\FamilyHistory3Type;
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
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Generic\Common;

/**
 * Class FamilyHistory3DataXML
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"familyHistory", "common"})
 */
class FamilyHistory3DataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\FamilyHistory3Type")
     * @SerializedName("family-history")
     */
    protected $familyHistory;

    public function __construct (FamilyHistory3Type $familyHistory = NULL, Common $common = NULL)
    {
        $this->familyHistory = $familyHistory;
        parent::__construct($common);
    }

    /**
     * @param FamilyHistory3Type $familyHistory
     */
    public function setFamilyHistory($familyHistory)
    {
        $this->familyHistory = $familyHistory;
    }

    /**
     * @return FamilyHistory3Type
     */
    public function getFamilyHistory()
    {
        return $this->familyHistory;
    }


}