<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 9:18 AM
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("baby") */
class Baby
{
    /**
     * @Type("elevate\HVObjects\Generic\Name")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("gender")
     */
    protected $gender;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("weight")
     */
    protected $weight;

    /**
     * @Type("elevate\HVObjects\Generic\LengthValue")
     * @SerializedName("length")
     */
    protected $length;

    /**
     * @Type("elevate\HVObjects\Generic\LengthValue")
     * @SerializedName("head-circumference")
     */
    protected $headCircumference;

    /**
     * @Type("string")
     * @SerializedName("note")
     */
    protected $note;

    function __construct($name = NULL, $gender = NULL, $headCircumference = NULL, $length = NULL, $note = NULL, $weight = NULL)
    {
        $this->gender     = $gender;
        $this->headCircumference = $headCircumference;
        $this->length     = $length;
        $this->name       = $name;
        $this->note       = $note;
        $this->weight     = $weight;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $headCircumference
     */
    public function setHeadCircumference($headCircumference)
    {
        $this->headCircumference = $headCircumference;
    }

    /**
     * @return mixed
     */
    public function getHeadCircumference()
    {
        return $this->headCircumference;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }
} 