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
class ApproxDate {

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



} 