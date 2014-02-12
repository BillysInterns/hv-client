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


/** @XmlRoot("file") */
class File extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\FileDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\FileDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @Type("elevate\HVObjects\Generic\DataOther")
     * @serializedName("data-other")
     */
    protected $dataOther;

    function __construct($dataXML = NULL, $dataOther = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('File');
        $this->dataXML = $dataXML;
        $this->dataOther = $dataOther;
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @param array $dataXML
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

    /**
     * @param mixed $dataOther
     */
    public function setDataOther($dataOther)
    {
        $this->dataOther = $dataOther;
    }

    /**
     * @return mixed
     */
    public function getDataOther()
    {
        return $this->dataOther;
    }


}