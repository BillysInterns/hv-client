<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 3:39 PM
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

class Info
{

    /** @var array elevate\HVObjects\Generic\MethodObjects\RequestGroup
     * @XmlList(inline=false, entry="group")
     * @Type("array<elevate\HVObjects\Generic\MethodObjects\RequestGroup>")
     * @SerializedName("group")
     */
    protected $groups;

    function __construct(array $groups)
    {
        $this->groups = $groups;
    }


}