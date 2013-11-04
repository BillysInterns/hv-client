<?php

/**
 * @author arkzero
 */
namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;


class Name
{

    /**
     * @Type("string")
     * @SerializedName("full")
     */
    protected $full;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("title")
     */
    protected $title;

    /**
     * @Type("string")
     * @SerializedName("first")
     */
    protected $first;

    /**
     * @Type("string")
     * @SerializedName("middle")
     */
    protected $middle;

    /**
     * @Type("string")
     * @SerializedName("last")
     */
    protected $last;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("suffix")
     */
    protected $suffix;

    /**
     * @param $first
     * @param $full
     * @param $last
     * @param $middle
     * @param $suffix
     * @param $title
     */
    function __construct($full, CodableValue $title, $first, $middle, $last, CodableValue $suffix)
    {
        $this->full = $full;
        $this->title = $title;
        $this->first = $first;
        $this->middle = $middle;
        $this->last = $last;
        $this->suffix = $suffix;

    }


}