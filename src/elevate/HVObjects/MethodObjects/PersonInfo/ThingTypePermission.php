<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 2:06 PM
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

use elevate\HVObjects\MethodObjects\PersonInfo\Permissions;

/** @XmlRoot("thing-type-permission") */
class ThingTypePermission
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("thing-type-id")
     */
    protected $thingTypeId;

    /**
     * @var elevate\HVObjects\MethodObjects\PersonInfo\Permissions
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\Permissions")
     * @SerializedName("online-access-permissions")
     */
    protected $onlineAccessPermissions = NULL;

    /**
     * @var elevate\HVObjects\MethodObjects\PersonInfo\Permissions
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\Permissions")
     * @SerializedName("offline-access-permissions")
     */
    protected $offlineAccessPermissions = NULL;

    function __construct(
        $thingTypeId,
        Permissions $onlineAccessPermissions,
        Permissions $offlineAccessPermissions
    )
    {
        $this->offlineAccessPermissions = $offlineAccessPermissions;
        $this->onlineAccessPermissions = $onlineAccessPermissions;
        $this->thingTypeId = $thingTypeId;
    }


}