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

use elevate\HVObjects\Generic\Address;
use elevate\HVObjects\Generic\Phone;
use elevate\HVObjects\Generic\Email;

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

    function __construct(Address $address, Email $email, Phone $phone)
    {
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }


}