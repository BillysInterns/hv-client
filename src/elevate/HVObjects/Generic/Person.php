<?php

/**
 * @author arkzero
 */
namespace elevate\HVObjects\Generic;

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


/** @XmlRoot("person") */
class Person
{

    /**
     * @Type("elevate\HVObjects\Generic\Name")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("string")
     * @SerializedName("organization")
     */
    protected $organization;

    /**
     * @Type("string")
     * @SerializedName("professional-training")
     */
    protected $professionalTraining;

    /**
     * @Type("string")
     * @SerializedName("id")
     */
    protected $id;

    /**
     * @Type("elevate\HVObjects\Generic\Contact")
     * @SerializedName("contact")
     */
    protected $contact;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("type")
     */
    protected $type;

    function __construct($name, $organization, $professionalTraining, $id, $contact, $type)
    {
        $this->name = $name;
        $this->organization = $organization;
        $this->professionalTraining = $professionalTraining;
        $this->id = $id;
        $this->contact = $contact;
        $this->type = $type;
    }


}