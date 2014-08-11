<?php

namespace elevate\HVObjects\Thing;


use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\FileDataXML;
use elevate\HVObjects\Generic\DataOther;


/** @XmlRoot("thing") */
class ContinuityOfCareDocument extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\CCDDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\CCDDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Continuity of Care Document');
        $this->dataXML = $dataXML;
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @param array $dataXML
     * @return mixed
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }
}