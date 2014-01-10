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
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Time")
     * @SerializedName("bed-time")
     */
    protected $bedTime;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Time")
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
     * @SerializedName("wake-state")
     */
    protected $wakeState;

    function __construct(
        $when = NULL,
        $bedTime = NULL,
        $wakeTime = NULL,
        $sleepMinutes = NULL,
        $settlingMinutes = NULL,
        $awakening = NULL,
        $medications = NULL,
        $wakeState = NULL
    )
    {
        $this->when = $when;
        $this->bedTime = $bedTime;
        $this->sleepMinutes = $sleepMinutes;
        $this->settlingMinutes = $settlingMinutes;
        $this->awakening = $awakening;
        $this->medications = $medications;
        $this->wakeState = $wakeState;
        $this->wakeTime = $wakeTime;

    }

    /**
     * @param mixed $awakening
     */
    public function setAwakening($awakening)
    {
        $this->awakening = $awakening;
    }

    /**
     * @return mixed
     */
    public function getAwakening()
    {
        return $this->awakening;
    }

    /**
     * @param mixed $bedTime
     */
    public function setBedTime($bedTime)
    {
        $this->bedTime = $bedTime;
    }

    /**
     * @return mixed
     */
    public function getBedTime()
    {
        return $this->bedTime;
    }

    /**
     * @param mixed $medications
     */
    public function setMedications($medications)
    {
        $this->medications = $medications;
    }

    /**
     * @return mixed
     */
    public function getMedications()
    {
        return $this->medications;
    }

    /**
     * @param mixed $settlingMinutes
     */
    public function setSettlingMinutes($settlingMinutes)
    {
        $this->settlingMinutes = $settlingMinutes;
    }

    /**
     * @return mixed
     */
    public function getSettlingMinutes()
    {
        return $this->settlingMinutes;
    }

    /**
     * @param mixed $sleepMinutes
     */
    public function setSleepMinutes($sleepMinutes)
    {
        $this->sleepMinutes = $sleepMinutes;
    }

    /**
     * @return mixed
     */
    public function getSleepMinutes()
    {
        return $this->sleepMinutes;
    }

    /**
     * @param mixed $wakeState
     */
    public function setWakeState($wakeState)
    {
        $this->wakeState = $wakeState;
    }

    /**
     * @return mixed
     */
    public function getWakeState()
    {
        return $this->wakeState;
    }

    /**
     * @param mixed $wakeTime
     */
    public function setWakeTime($wakeTime)
    {
        $this->wakeTime = $wakeTime;
    }

    /**
     * @return mixed
     */
    public function getWakeTime()
    {
        return $this->wakeTime;
    }

    /**
     * @param mixed $when
     */
    public function setWhen($when)
    {
        $this->when = $when;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }


}