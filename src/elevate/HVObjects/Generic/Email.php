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

/** @XmlRoot("email") */
class Email
{

    /**
     * @Type("string")
     */
    protected $description = null;

    /**
     * @Type("boolean")
     */
    protected $isPrimary = null;

    /**
     * @Type("string")
     */
    protected $address;

    /**
     * @param $address
     * @param $description
     * @param $isPrimary
     */
    public function __construct($address, $description, $isPrimary)
    {
        $this->address     = $address;
        $this->description = $description;
        $this->isPrimary   = $isPrimary;
    }

}