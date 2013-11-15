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

    function __construct($dataXML)
    {
        $typeID = TypeTranslator::lookupTypeID('Allergy');
        $this->dataXML = $dataXML;
        parent::__construct($dataXML, $typeID);
    }


} 