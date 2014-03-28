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
use elevate\HVObjects\Thing\DataXML\CCRDataXML;


/** @XmlRoot("thing") */
class ContinuityOfCareRecordCCR extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\CCRDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\CCRDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Continuity of Care Record (CCR)');
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