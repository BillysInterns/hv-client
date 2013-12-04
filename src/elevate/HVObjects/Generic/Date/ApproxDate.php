<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 10:08 AM
 */

namespace elevate\HVObjects\Generic\Date;

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


/** @XmlRoot("approx-date") */
class ApproxDate 
{

    /**
     * @Type("integer")
     * @SerializedName("y")
     */
    protected $year;

    /**
     * @Type("integer")
     * @SerializedName("m")
     */
    protected $month;

    /**
     * @Type("integer")
     * @SerializedName("d")
     */
    protected $day;

    /**
     * @param $y
     * @param $m
     * @param $d
     */
    public function __construct( $y = NULL, $m = NULL, $d =NULL )
    {
        $this->year = $y;
        $this->month = $m;
        $this->day = $d;
    }

    /**
     * @param mixed $d
     */
    public function setDay($d)
    {
        $this->day = $d;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $m
     */
    public function setMonth($m)
    {
        $this->month = $m;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $y
     */
    public function setYear($y)
    {
        $this->year = $y;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }



} 