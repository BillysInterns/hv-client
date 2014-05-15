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

/** @XmlRoot("thing") */
class BasicDemographicInfo extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\BasicDemographicInfoDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\BasicDemographicInfoDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('BasicDemographicInfo');
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