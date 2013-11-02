<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 4:04 PM
 * To change this template use File | Settings | File Templates.
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

/** @XmlRoot("Address") */
class Address
{

    /**
     * @Type("string")
     * @SerializedName("description")
     */
    protected $description;

    /**
     * @Type("boolean")
     * @SerializedName("is-primary")
     */
    protected $isPrimary;

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
    protected $state;

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
    protected $county;

}