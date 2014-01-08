<?php
/** @author troussos * */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

use elevate\HVObjects\Generic\Date\DateTime;

class EmotionType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    private $when;

    /**
     * @Type("integer")
     * @SerializedName("mood")
     */
    private $mood;

    /**
     * @Type("integer")
     * @SerializedName("stress")
     */
    private $stress;

    /**
     * @Type("integer")
     * @SerializedName("wellbeing")
     */
    private $wellbeing;

    function __construct(
        $mood = NULL, $stress = NULL, $wellbeing = NULL, DateTime $when = NULL
    )
    {
        $this->mood      = $mood;
        $this->stress    = $stress;
        $this->wellbeing = $wellbeing;
        $this->when      = $when;
    }

    /**
     * @return mixed
     */
    public function getMood()
    {
        return $this->mood;
    }

    /**
     * @param $mood
     *
     * @return $this
     */
    public function setMood($mood)
    {
        $this->mood = $mood;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStress()
    {
        return $this->stress;
    }

    /**
     * @param $stress
     *
     * @return $this
     */
    public function setStress($stress)
    {
        $this->stress = $stress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWellbeing()
    {
        return $this->wellbeing;
    }

    /**
     * @param $wellbeing
     *
     * @return $this
     */
    public function setWellbeing($wellbeing)
    {
        $this->wellbeing = $wellbeing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * @param $when
     *
     * @return $this
     */
    public function setWhen(DateTime $when)
    {
        $this->when = $when;
        return $this;
    }
} 