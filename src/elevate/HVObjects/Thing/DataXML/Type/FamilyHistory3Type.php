<?php

/** @author jonfor */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("family-history") */
class FamilyHistory3Type
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\ConditionType")
     * @SerializedName("condition")
     */
    protected $condition;

    /**
     * @Type("elevate\HVObjects\Generic\FamilyHistoryRelative")
     * @SerializedName("family-history-relative")
     */
    protected $familyHistoryRelative;

    /**
     * @param  $condition
     * @param  $familyHistoryRelative
     */
    function __construct($condition = NULL, $familyHistoryRelative = NULL)
    {
        $this->condition                = $condition;
        $this->familyHistoryRelative    = $familyHistoryRelative;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $familyHistoryRelative
     */
    public function setFamilyHistoryRelative($familyHistoryRelative)
    {
        $this->familyHistoryRelative = $familyHistoryRelative;
    }

    /**
     * @return mixed
     */
    public function getFamilyHistoryRelative()
    {
        return $this->familyHistoryRelative;
    }

}