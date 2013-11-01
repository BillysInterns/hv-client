<?php


namespace elevate\HVObjects\GenericTypes;

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
     * @Type("array<game\XMLObjects\Types\Generic\CodedValue>")
     */
    protected $codes;

}