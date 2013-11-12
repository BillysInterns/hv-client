<?php

namespace elevate\HVObjects\Thing;


use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\FileDataXML;


/** @XmlRoot("file") */
class File extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\FileDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\FileDataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML)
    {
        $typeID = TypeTranslator::lookupTypeID('File');
        parent::__construct($dataXML,$typeID);
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