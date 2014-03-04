<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 9:27 AM
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("pregnancy") */

class PregnancyType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("dueDate")
     */
    protected $dueDate;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Date")
     * @SerializedName("lastMenstrualPeriod")
     */
    protected $lastMenstrualPeriod;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("conceptionMethod")
     */
    protected $conceptionMethod;

    /**
     * @Type("integer")
     * @SerializedName("fetusCount")
     */
    protected $fetusCount;

    /**
     * @Type("integer")
     * @SerializedName("gestationalAge")
     */
    protected $gestationalAge;

    /**
     * @Type("elevate\HVObjects\Generic\Delivery")
     * @SerializedName("delivery")
     */
    protected $delivery;

    function __construct($delivery = NULL, $dueDate = NULL, $conceptionMethod = NULL, $fetusCount = NULL, $gestationalAge = NULL, $lastMenstrualPeriod = NULL)
    {
        $this->conceptionMethod    = $conceptionMethod;
        $this->delivery            = $delivery;
        $this->dueDate             = $dueDate;
        $this->fetusCount          = $fetusCount;
        $this->gestationalAge      = $gestationalAge;
        $this->lastMenstrualPeriod = $lastMenstrualPeriod;
    }

    /**
     * @param mixed $conceptionMethod
     */
    public function setConceptionMethod($conceptionMethod)
    {
        $this->conceptionMethod = $conceptionMethod;
    }

    /**
     * @return mixed
     */
    public function getConceptionMethod()
    {
        return $this->conceptionMethod;
    }

    /**
     * @param mixed $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $fetusCount
     */
    public function setFetusCount($fetusCount)
    {
        $this->fetusCount = $fetusCount;
    }

    /**
     * @return mixed
     */
    public function getFetusCount()
    {
        return $this->fetusCount;
    }

    /**
     * @param mixed $gestationalAge
     */
    public function setGestationalAge($gestationalAge)
    {
        $this->gestationalAge = $gestationalAge;
    }

    /**
     * @return mixed
     */
    public function getGestationalAge()
    {
        return $this->gestationalAge;
    }

    /**
     * @param mixed $lastMenstrualPeriod
     */
    public function setLastMenstrualPeriod($lastMenstrualPeriod)
    {
        $this->lastMenstrualPeriod = $lastMenstrualPeriod;
    }

    /**
     * @return mixed
     */
    public function getLastMenstrualPeriod()
    {
        return $this->lastMenstrualPeriod;
    }




} 