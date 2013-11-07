<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 8:40 AM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects\PersonInfo;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("group") */
class HVGroup
{
    /**
     * @Type("string")
     */
    protected $name;

    /**
     * @Type("string")
     */
    protected $id;

    /**
     * @Type("elevate\HVObjects\Generic\Email")
     * @SerializedName("contact-email")
     */
    protected $contactEmail;
}