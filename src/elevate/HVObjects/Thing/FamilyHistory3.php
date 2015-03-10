<?php

/** @author jonfor */

namespace elevate\HVObjects\Thing;

use elevate\HVObjects\Thing\DataXML\Type\FamilyHistory3Type;
use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\FamilyHistory3DataXML;

/**
 * Class FamilyHistory3
 * @package elevate\HVObjects\Thing
 * @XmlRoot("thing")
 */
class FamilyHistory3 extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\FamilyHistory3DataXML
     * @Type("elevate\HVObjects\Thing\DataXML\FamilyHistory3DataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    function __construct(FamilyHistory3DataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Family History #(v3)');
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }


}