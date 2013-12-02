<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use elevate\HVObjects\Thing\DataXML\HeightDataXML;
use elevate\HVObjects\Thing\DataXML\Type\HeightType;
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
        $typeID = TypeTranslator::lookupTypeID('Height Measurement');
        parent::__construct($dataXML,$typeID);
        return $this;
    }
} 