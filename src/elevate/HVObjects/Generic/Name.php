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
        return $this;

    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->first = $first;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param mixed $full
     */
    public function setFull($full)
    {
        $this->full = $full;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * @param mixed $middle
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddle()
    {
        return $this->middle;
    }

    /**
     * @param mixed $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }



}