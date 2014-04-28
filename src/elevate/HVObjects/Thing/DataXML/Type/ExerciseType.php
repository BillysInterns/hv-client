<?php
/**
 * Created by PhpStorm.
 * User: ofields
 * Date: 4/27/14
 * Time: 8:12 AM
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Thing\DataXML\Type\Exercise\StructuredNameValue;
use elevate\HVObjects\Generic\LengthValue;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

class ExerciseType {

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("activity")
     */
    protected $activity;

    /**
     * @Type("string")
     * @SerializedName("title")
     */
    protected $title;

    /**
     * @Type("elevate\HVObjects\Generic\LengthValue")
     * @SerializedName("distance")
     */
    protected $distance;

    /**
     * @Type("integer")
     * @SerializedName("duration")
     */
    protected $duration;

    /**
     * @var array
     * @XmlList(inline=true, entry="detail")
     * @Type("array<elevate\HVObjects\Thing\DataXML\Type\Exercise\StructuredNameValue>")
     */
    protected $details;

    /**
     * @param ApproxDateTime $when
     * @param CodableValue $activity
     */
    function __construct($when, $activity)
    {
        $this->activity = $activity;
        $this->when = $when;
    }


    /**
     * @param CodableValue $activity
     */
    public function setActivity(CodableValue $activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return CodableValue
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param array $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @param StructuredNameValue $detail
     */
    public function addDetail(StructuredNameValue $detail)
    {
        $this->details[] = $detail;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param LengthValue $distance
     */
    public function setDistance(LengthValue $distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return LengthValue
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param integer $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param ApproxDateTime $when
     */
    public function setWhen(ApproxDateTime $when)
    {
        $this->when = $when;
    }

    /**
     * @return ApproxDateTime
     */
    public function getWhen()
    {
        return $this->when;
    }

} 