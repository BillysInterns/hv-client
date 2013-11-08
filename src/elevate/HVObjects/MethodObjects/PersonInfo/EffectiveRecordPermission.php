<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 2:00 PM
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

/** @XmlRoot("effective-record-permission") */
class EffectiveRecordPermission
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("record-id")
     */
    protected $recordId;

    /**
     * @var array elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission
     * @XmlList(inline=true, entry="thing-type-permission")
     * @Type("array<elevate\HVObjects\MethodObjects\PersonInfo\ThingTypePermission>")
     * @SerializedName("thing-type-permission")
     */
    protected $thingTypePermission;

    function __construct($recordId, array $thingTypePermission)
    {
        $this->recordId = $recordId;
        $this->thingTypePermission = $thingTypePermission;
    }

    /**
     * @param string $recordId
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * @return string
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @param array $thingTypePermission
     */
    public function setThingTypePermission($thingTypePermission)
    {
        $this->thingTypePermission = $thingTypePermission;
    }

    /**
     * @return array
     */
    public function getThingTypePermission()
    {
        return $this->thingTypePermission;
    }


}