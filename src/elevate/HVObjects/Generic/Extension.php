<?php
/**
 * @author - Sumit
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\XmlKeyValuePairs;
use JMS\Serializer\Annotation\XmlAttributeMap;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\AccessorOrder;
use elevate\HVObjects\Generic\Repeat;

/**
 * @XmlRoot("extension")
 */
class Extension
{

    /**
     * @XmlAttribute
     * @Type("string")
     */
    public $source;

    // Subclasses will define whatever other data they need once the bug with JMS is fixed

    /**
     * @Type("elevate\HVObjects\Generic\Repeat")
     *
     */
    public  $repeat;

    /**
     * @Type("elevate\HVObjects\Generic\SymptomInfo")
     */
    public $symptomInfo;

    /**
     * @Type("string")
     */
    public $appointmentAttended;

    /**
     * @Type("string")
     */
    public $conditionStartDate;

    /**
     * @Type("string")
     */
    public $conditionEndDate;

    /**
     * @Type("string")
     */
    public $conditionStopReason;

    /**
     * @Type("string")
     */
    public $locationType;

    /**
     * @Type("string")
     */
    public $locationContext;

    /**
     * @Type("string")
     */
    public $studyName;

    /**
     * @Type("string")
     */
    public $timestamp;

    /**
     * @Type("string")
     */
    public $paperScale;

    /**
     * @Type("string")
     */
    public $studyVisitType;

    /**
     * @param mixed $conditionStopReason
     */
    public function setConditionStopReason($conditionStopReason)
    {
        $this->conditionStopReason = $conditionStopReason;
    }

    /**
     * @return mixed
     */
    public function getConditionStopReason()
    {
        return $this->conditionStopReason;
    }

    /**
     * @param mixed $conditionEndDate
     */
    public function setConditionEndDate($conditionEndDate)
    {
        $this->conditionEndDate = $conditionEndDate;
    }

    /**
     * @return mixed
     */
    public function getConditionEndDate()
    {
        return $this->conditionEndDate;
    }

    /**
     * @param mixed $conditionStartDate
     */
    public function setConditionStartDate($conditionStartDate)
    {
        $this->conditionStartDate = $conditionStartDate;
    }

    /**
     * @return mixed
     */
    public function getConditionStartDate()
    {
        return $this->conditionStartDate;
    }

    /**
     * @param mixed $appointmentAttended
     */
    public function setAppointmentAttended($appointmentAttended)
    {
        $this->appointmentAttended = $appointmentAttended;
    }

    /**
     * @return mixed
     */
    public function getAppointmentAttended()
    {
        return $this->appointmentAttended;
    }

    /**
     * @param mixed $repeat
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * @return mixed
     */
    public function getRepeat()
    {
        return $this->repeat;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $symptomInfo
     */
    public function setSymptomInfo($symptomInfo)
    {
        $this->symptomInfo = $symptomInfo;
    }

    /**
     * @return mixed
     */
    public function getSymptomInfo()
    {
        return $this->symptomInfo;
    }

    /**
     * @param mixed $locationContext
     */
    public function setLocationContext($locationContext)
    {
        $this->locationContext = $locationContext;
    }

    /**
     * @return mixed
     */
    public function getLocationContext()
    {
        return $this->locationContext;
    }

    /**
     * @param mixed $locationType
     */
    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;
    }

    /**
     * @return mixed
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * @return mixed
     */
    public function getStudyName()
    {
        return $this->studyName;
    }

    /**
     * @param mixed $studyName
     */
    public function setStudyName($studyName)
    {
        $this->studyName = $studyName;
    }
    
    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getPaperScale()
    {
        return $this->paperScale;
    }

    /**
     * @param mixed $paperScale
     */
    public function setPaperScale($paperScale)
    {
        $this->paperScale = $paperScale;
    }

    /**
     * @return JSON
     */
    public function getStudyVisitType()
    {
        return $this->studyVisitType;
    }

    /**
     * @param JSON $studyVisitType
     */
    public function setStudyVisitType($studyVisitType)
    {
        $this->studyVisitType = $studyVisitType;
    }

}