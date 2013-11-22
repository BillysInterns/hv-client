<?php

/**
 * @author troussos
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;

use elevate\HVObjects\Thing\DataXML\BodyCompositionDataXML;

/** @XmlRoot("thing") */
class BodyComposition extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\BodyCompositionDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\BodyCompositionDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    public function __construct(BodyCompositionDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Body Composition');
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
        return $this;
    }


}