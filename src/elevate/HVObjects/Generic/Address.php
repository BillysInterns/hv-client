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
    protected $postCode;
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
    public function __construct($description, $street, $city, $state, $postCode, $county, $country, $isPrimary)
    {
        $this->city        = $city;
        $this->country     = $country;
        $this->county      = $county;
        $this->description = $description;
        $this->isPrimary   = $isPrimary;
        $this->postCode    = $postCode;
        $this->state       = $state;
        $this->street      = $street;
    }

}