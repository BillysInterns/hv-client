<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 4:04 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("filter") */
class ThingFilterSpec
{

    /**
     * @Type("string")
     * @SerializedName("type-id")
     */
    protected $typeId;

    /**
     * @Type("string")
     * @SerializedName("xpath")
     */
    protected $xpath;

    /**
     * @param      $typeId
     * @param null $xpath
     */
    function __construct($typeId, $xpath = NULL)
    {
        $this->typeId = $typeId;
        $this->xpath = $xpath;
    }

    /**
     * @param mixed $typeId
     * @returns $this
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param mixed $xpath
     * @returns $this
     */
    public function setXpath($xpath)
    {
        $this->xpath = $xpath;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXpath()
    {
        return $this->xpath;
    }

}