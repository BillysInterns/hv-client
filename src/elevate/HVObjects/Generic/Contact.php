<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 4:01 PM
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

/** @XmlRoot("allergy") */
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

}