<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use elevate\HVObjects\Thing\DataXML\HealthEventDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HealthEventType;
use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */

class HealthEvent extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\HealthEventDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\HealthEventDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    public function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Health Event');
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