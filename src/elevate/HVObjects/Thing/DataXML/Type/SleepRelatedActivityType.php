<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 1:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Activity;
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

/** @XmlRoot("sleep-pm") */
class SleepRelatedActivityType
{

    /**
     * @Type("elevate\HVObjects\GenericTypes\DateTime")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\GenericTypes\Time")
     */
    protected $caffeine;

    /**
     * @Type("elevate\HVObjects\GenericTypes\Time")
     */
    protected $alcohol;

    /**
     * @Type("elevate\HVObjects\GenericTypes\Activity")
     */
    protected $nap;

    /**
     * @Type("elevate\HVObjects\GenericTypes\Activity")
     */
    protected $exercise;

    /**
     * @Type("integer")
     */
    protected $sleepiness;

    function __construct(
        DateTime $when,
        Time $caffeine = NULL,
        Time $alcohol = NULL,
        Activity $nap = NULL,
        Activity $exercise = NULL,
        $sleepiness
    )
    {
        $this->when         = $when;
        $this->caffeine     = $caffeine;
        $this->alcohol      = $alcohol;
        $this->nap          = $nap;
        $this->exercise     = $exercise;
        $this->sleepiness   = $sleepiness;

    }


}