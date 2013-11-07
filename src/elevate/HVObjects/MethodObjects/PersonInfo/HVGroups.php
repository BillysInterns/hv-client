<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:35 PM
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

/** @XmlRoot("groups") */
class HVGroups
{
    /**
     * @var array elevate\HVObjects\Generic\HVGroup
     * @XmlList(inline=true, entry="code")
     * @Type("array<elevate\HVObjects\Generic\HVGroup")
     */
    protected $group;

    function __construct(array $group)
    {
        $this->group = $group;
    }


}