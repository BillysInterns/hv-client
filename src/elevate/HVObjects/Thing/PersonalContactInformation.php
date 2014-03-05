<?php

/**
 * @author Jonfor
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;

/** @XmlRoot("thing") */
class PersonalContactInformation extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\PersonalContactInformationDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\PersonalContactInformationDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Personal Contact Information');
        $this->dataXML = $dataXML;
        parent::__construct($dataXML, $typeID);
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