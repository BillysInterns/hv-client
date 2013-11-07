<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:36 PM
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

use elevate\HVObjects\Generic\EffectiveRecordPermission;

/** @XmlRoot("effective-record-permission-list") */
class EffectiveRecordPermissionList
{
    /**
     * @var array elevate\HVObject\Generic\EffectiveRecordPermission
     * @XmlList(inline=true, entry="record-permission")
     * @Type("array<elevate\HVObjects\Generic\EffectiveRecordPermission>")
     */
    protected $effectiveRecordPermission;

    function __construct(array $effectiveRecordPermission)
    {
        $this->effectiveRecordPermission = $effectiveRecordPermission;
    }


}