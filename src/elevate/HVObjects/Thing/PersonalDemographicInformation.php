<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */

class PersonalDemographicInformation extends Thing
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\PersonalDemographicInformationDataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    public function __construct($dataXML)
    {
        $typeID = TypeTranslator::lookupTypeID('Personal Demographic Information');
        parent::__construct($dataXML,$typeID);
    }
} 