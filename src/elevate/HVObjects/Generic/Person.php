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

    function __construct(Name $name, $organization, $professionalTraining, $id, Contact $contact, CodableValue $type)
    {
        $this->name = $name;
        $this->organization = $organization;
        $this->professionalTraining = $professionalTraining;
        $this->id = $id;
        $this->contact = $contact;
        $this->type = $type;
        return $this;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $professionalTraining
     */
    public function setProfessionalTraining($professionalTraining)
    {
        $this->professionalTraining = $professionalTraining;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfessionalTraining()
    {
        return $this->professionalTraining;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }



}