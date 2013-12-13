<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\HVObjects\Thing\DataXML\EmergencyOrProviderDataXML;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */
class EmergencyOrProviderContact extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\EmergencyOrProviderContactDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\EmergencyOrProviderContactDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    public function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Emergency Or Provider Contact');
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