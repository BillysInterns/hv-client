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

use elevate\HVObjects\MethodObjects\PersonInfo\HVGroup;

/** @XmlRoot("groups") */
class HVGroups
{
    /**
     * @var array elevate\HVObjects\Generic\HVGroup
     * @XmlList(inline=true, entry="group")
     * @Type("array<elevate\HVObjects\MethodObjects\PersonInfo\HVGroup>")
     */
    protected $group;

    function __construct(array $group)
    {
        $this->group = $group;
    }

    /**
     * @param array $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return array
     */
    public function getGroup()
    {
        return $this->group;
    }


}