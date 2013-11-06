<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 2:00 PM
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
use elevate\HVObjects\Generic\ThingTypePermission;

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
     * @var array elevate\HVObjects\Generic\ThingTypePermission
     * @XmlList(inline=true, entry="thing-type-permission")
     * @Type("array<elevate\HVObjects\Generic\ThingTypePermission")
     * @SerializedName("thing-type-permission")
     */
    protected $thingTypePermission;

    function __construct($recordId, array $thingTypePermission)
    {
        $this->recordId = $recordId;
        $this->thingTypePermission = $thingTypePermission;
    }


}