<?php

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\TypeTranslator;

/** @XmlRoot("thing") */
class PersonalImage extends Thing
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\PersonalImageDataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @Type("elevate\HVObjects\Generic\DataOther")
     * @serializedName("data-other")
     */
    protected $dataOther;

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



    function __construct($dataXML = NULL, $dataOther = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Personal Image');
        $this->dataXML = $dataXML;
        $this->dataOther = $dataOther;
        parent::__construct($dataXML, $typeID);
    }


} 