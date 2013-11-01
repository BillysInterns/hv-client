<?php

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */
class Condition extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\Condition
     * @Type("elevate\HVObjects\Thing\DataXML\Condition")
     * @serializedName("data-xml")
     */
    protected $dataXML;

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