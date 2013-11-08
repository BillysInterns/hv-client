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

/** @XmlRoot("effective-record-permission-list") */
class EffectiveRecordPermissionList
{
    /**
     * @var array elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermission
     * @XmlList(inline=true, entry="effective-record-permission")
     * @Type("array<elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermission>")
     */
    protected $effectiveRecordPermission;

    function __construct(array $effectiveRecordPermission)
    {
        $this->effectiveRecordPermission = $effectiveRecordPermission;
    }


}