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

/** @XmlRoot("thing") */
class PersonalImage extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\PersonalImageDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\PersonalImageDataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML)
    {
        $this->dataXML = $dataXML;
    }


} 