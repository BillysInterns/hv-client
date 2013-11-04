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

/** @XmlRoot("contact") */
class Contact
{

    /**
     * @Type("elevate\HVObjects\Generic\Address")
     * @SerializedName("address")
     */
    protected $address;

    /**
     * @Type("elevate\HVObjects\Generic\Phone")
     * @SerializedName("phone")
     */
    protected $phone;

    /**
     * @Type("elevate\HVObjects\Generic\Email")
     * @SerializedName("email")
     */
    protected $email;

    function __construct($address, $email, $phone)
    {
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
    }


}