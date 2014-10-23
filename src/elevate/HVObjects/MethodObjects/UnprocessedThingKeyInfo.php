<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\MethodObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("unprocessed-thing-key-info") */
class UnprocessedThingKeyInfo 
{
    /**
     * @var string
     * @Type("elevate\HVObjects\Generic\ThingId")
     * @SerializedName("thing-id")
     */
    private $thingId;

    /**
     * @var string
     * @Type("elevate\HVObjects\Generic\TypeId")
     * @SerializedName("type-id")
     */
    private $typeId;

    /**
     * @Type("string")
     * @Accessor(getter="getEffDateAsString",setter="setEffDate")
     * @SerializedName("eff-date")
     */
    private $effDate;

    /**
     * @Type("string")
     * @Accessor(getter="getUpdatedEndDate",setter="setUpdatedEndDate")
     * @SerializedName("updated-end-date")
     */
    private $updatedEndDate;

    /**
     * @param mixed $effDate
     */
    public function setEffDate($effDate)
    {
        $this->effDate = $effDate;
    }

    /**
     * @return mixed
     */
    public function getEffDate()
    {
        return $this->effDate;
    }

    /**
     * @param mixed $thingId
     */
    public function setThingId($thingId)
    {
        $this->thingId = $thingId;
    }

    /**
     * @return mixed
     */
    public function getThingId()
    {
        return $this->thingId;
    }

    /**
     * @param mixed $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param mixed $updatedEndDate
     */
    public function setUpdatedEndDate($updatedEndDate)
    {
        $this->updatedEndDate = $updatedEndDate;
    }

    /**
     * @return mixed
     */
    public function getUpdatedEndDate()
    {
        return $this->updatedEndDate;
    }

} 