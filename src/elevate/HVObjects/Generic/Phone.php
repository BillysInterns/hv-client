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

/** @XmlRoot("phone") */
class Phone
{

    /**
     * @Type("string")
     */
    protected $description;

    /**
     * @Type("boolean")
     * @SerializedName("is-primary")
     */
    protected $isPrimary;

    /**
     * @Type("string")
     */
    protected $number;

    /**
     * @param $description
     * @param $isPrimary
     * @param $number
     */
    function __construct($description, $isPrimary, $number)
    {
        $this->description = $description;
        $this->isPrimary = $isPrimary;
        $this->number = $number;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }



}