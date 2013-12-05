<?php

namespace elevate\HVObjects\Thing;


use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\Medication2DataXML;


/** @XmlRoot("medication") */
class Medication2 extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\Medication2DataXML
     * @Type("elevate\HVObjects\Thing\DataXML\Medication2DataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Medication');
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

}