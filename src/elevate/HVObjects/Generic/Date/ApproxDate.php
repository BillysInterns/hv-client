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
    protected $y;

    /**
     * @Type("integer")
     * @SerializedName("m")
     */
    protected $m;

    /**
     * @Type("integer")
     * @SerializedName("d")
     */
    protected $d;

    /**
     * @param $y
     * @param $m
     * @param $d
     */
    public function __construct( $y = NULL, $m = NULL, $d =NULL )
    {
        $this->y = $y;
        $this->m = $m;
        $this->d = $d;
    }

    /**
     * @param mixed $d
     */
    public function setD($d)
    {
        $this->d = $d;
    }

    /**
     * @return mixed
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * @param mixed $m
     */
    public function setM($m)
    {
        $this->m = $m;
    }

    /**
     * @return mixed
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }



} 