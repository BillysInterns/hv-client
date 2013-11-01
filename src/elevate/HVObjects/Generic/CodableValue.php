<?php


namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
class CodableValue 
{

    /**
     * @Type("string")
     */
    protected $text;

    /**
     * @var array
     * @XmlList(inline=true, entry="code")
     * @Type("array<elevate\HVObjects\Generic\CodedValue>")
     */
    protected $codes;

}