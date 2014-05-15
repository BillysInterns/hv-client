<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\BasicDemographicInformationv2DataXML;

/** @XmlRoot("thing") */
class BasicDemographicInformationv2 extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\BasicDemographicInformationv2DataXML
     * @Type("elevate\HVObjects\Thing\DataXML\BasicDemographicInformationv2DataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Basic Demographic Information #(v2)');
        $this->dataXML = $dataXML;
        parent::__construct($dataXML, $typeID);
    }

    /**
     * @param mixed $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return mixed
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }


} 