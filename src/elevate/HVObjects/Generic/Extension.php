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
     * @Type("boolean")
     */
    public $appointmentAttended;



    function __construct(
        $repeat = NULL, $source = NULL, $symptomInfo = NULL, $appointmentAttended = NULL)
    {
        $this->repeat              = $repeat;
        $this->source              = $source;
        $this->symptomInfo           = $symptomInfo;
        $this->appointmentAttended = $appointmentAttended;
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

} 