<?php


namespace elevate\HVObjects\Generic;

class CodableValue
{

    /**
     * @Type("string")
     */
    protected $text;
    /**
     * @var array elevate\HVObjects\Generic\CodedValue
     * @XmlList(inline=true, entry="code")
     * @Type("array<elevate\HVObjects\Generic\CodedValue>")
     */
    protected $codes;

    public function __construct($text, array $codes = array())
    {
        $this->text  = $text;
        $this->codes = $codes;
    }

}