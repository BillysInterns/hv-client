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

/** @XmlRoot("address") */
class Address
{

    /**
     * @Type("string")
     * @SerializedName("description")
     */
    protected $description = NULL;
    /**
     * @Type("boolean")
     * @SerializedName("is-primary")
     */
    protected $isPrimary = NULL;
    /**
     * @Type("string")
     * @SerializedName("street")
     */
    protected $street;
    /**
     * @Type("string")
     * @SerializedName("city")
     */
    protected $city;
    /**
     * @Type("string")
     * @SerializedName("state")
     */
    protected $state = NULL;
    /**
     * @Type("string")
     * @SerializedName("postcode")
     */
    protected $postcode;
    /**
     * @Type("string")
     * @SerializedName("country")
     */
    protected $country;
    /**
     * @Type("string")
     * @SerializedName("county")
     */
    protected $county = NULL;

    /**
     * @param $description
     * @param $street
     * @param $city
     * @param $state
     * @param $postCode
     * @param $county
     * @param $country
     * @param $isPrimary
     */
    public function __construct($description = NULL, $street = NULL, $city = NULL, $state = NULL, $postCode = NULL, $county = NULL, $country = NULL, $isPrimary = NULL)
    {
        $this->city        = $city;
        $this->country     = $country;
        $this->county      = $county;
        $this->description = $description;
        $this->isPrimary   = $isPrimary;
        $this->postcode    = $postCode;
        $this->state       = $state;
        $this->street      = $street;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param boolean $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return boolean
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * @param string $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postcode = $postCode;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postcode;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }


}