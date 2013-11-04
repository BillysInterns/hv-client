<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:51 PM
 * To change this template use File | Settings | File Templates.
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

use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("awakening") */
class Awakening
{
    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     */
    protected $when;

    /**
     * @Type("integer")
     */
    protected $minutes;

    function __construct(
        DateTime $when,
        $minutes
    )
    {
        $this->minutes = $minutes;
        $this->when = $when;
    }
}