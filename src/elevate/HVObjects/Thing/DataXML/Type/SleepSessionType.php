<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

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

/** @XmlRoot("sleep-am") */
class SleepSessionType
{

    /**
     * @Type("elevate\HVObjects\Generic\DateTime")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\Time")
     * @SerializedName("bed-time")
     */
    protected $bedTime;

    /**
     * @Type("elevate\HVObjects\Generic\Time")
     * @SerializedName("wake-time")
     */
    protected $wakeTime;

    /**
     * @Type("integer")
     * @SerializedName("sleep-minutes")
     */
    protected $sleepMinutes;

    /**
     * @Type("integer")
     * @SerializedName("settling-minutes")
     */
    protected $settlingMinutes;

    /**
     * @Type("elevate\HVObjects\Generic\Awakening")
     */
    protected $awakening;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     */
    protected $medications;

    /**
     * @Type("integer")
     * @Serialized("wake-state")
     */
    protected $wakeState;

    function __construct(
        $when,
        $bedTime,
        $wakeTime,
        $sleepMinutes,
        $settlingMinutes,
        $awakening = NULL,
        $medications = NULL,
        $wakeState
    )
    {
        $this->when = $when;
        $this->bedTime = $bedTime;
        $this->bedTime = $bedTime;
        $this->sleepMinutes = $sleepMinutes;
        $this->settlingMinutes = $settlingMinutes;
        $this->awakening = $awakening;
        $this->medications = $medications;
        $this->wakeState = $wakeState;
        $this->wakeTime = $wakeTime;

    }


}