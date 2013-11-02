<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 3:46 PM
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

}