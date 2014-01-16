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
     * @SerializedName("eff-date-min")
     */
    protected $effectiveMinimumDate;

    /**
     * @Type("string")
     * @SerializedName("eff-date-max")
     */
    protected $effectiveMaximumDate;

    /**
     * @Type("string")
     * @SerializedName("xpath")
     */
    protected $xpath;

    /**
     * @param      $typeId
     * @param null $xpath
     */
    function __construct($typeId, $xpath = NULL, $effectiveMinimumDate = null, $effectiveMaximumDate = null)
    {
        $this->typeId = $typeId;
        $this->xpath = $xpath;
        $this->effectiveMaximumDate = $effectiveMaximumDate;
        $this->effectiveMinimumDate = $effectiveMinimumDate;
    }

    /**
     * @param mixed $typeId
     * @return $this
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEffectiveMaximumDate()
    {
        return $this->effectiveMaximumDate;
    }

    /**
     * @return mixed
     */
    public function getEffectiveMinimumDate()
    {
        return $this->effectiveMinimumDate;
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