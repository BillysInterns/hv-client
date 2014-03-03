<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 9:23 AM
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("delivery") */
class Delivery
{

    /**
     * @Type("elevate\HVObjects\Generic\Organization")
     * @SerializedName("location")
     */
    protected $location;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("timeOfDelivery")
     */
    protected $timeOfDelivery;

    /**
     * @Type("double")
     * @SerializedName("laborDuration")
     */
    protected $laborDuration;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("complications")
     */
    protected $complications;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("anesthesia")
     */
    protected $anesthesia;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("deliveryMethod")
     */
    protected $deliveryMethod;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("outcome")
     */
    protected $outcome;

    /**
     * @Type("elevate\HVObjects\Generic\Baby")
     * @SerializedName("baby")
     */
    protected $baby;

    /**
     * @Type("string")
     * @SerializedName("note")
     */
    protected $note;

    function __construct(
        $location = NULL,
        $timeOfDelivery = NULL,
        $anesthesia = NULL,
        $baby = NULL,
        $complications = NULL,
        $deliveryMethod = NULL,
        $laborDuration = NULL,
        $note = NULL,
        $outcome = NULL

    )
    {
        $this->anesthesia     = $anesthesia;
        $this->baby           = $baby;
        $this->complications  = $complications;
        $this->deliveryMethod = $deliveryMethod;
        $this->laborDuration  = $laborDuration;
        $this->location       = $location;
        $this->note           = $note;
        $this->outcome        = $outcome;
        $this->timeOfDelivery = $timeOfDelivery;
    }

    /**
     * @param mixed $anesthesia
     */
    public function setAnesthesia($anesthesia)
    {
        $this->anesthesia = $anesthesia;
    }

    /**
     * @return mixed
     */
    public function getAnesthesia()
    {
        return $this->anesthesia;
    }

    /**
     * @param mixed $baby
     */
    public function setBaby($baby)
    {
        $this->baby = $baby;
    }

    /**
     * @return mixed
     */
    public function getBaby()
    {
        return $this->baby;
    }

    /**
     * @param mixed $complications
     */
    public function setComplications($complications)
    {
        $this->complications = $complications;
    }

    /**
     * @return mixed
     */
    public function getComplications()
    {
        return $this->complications;
    }

    /**
     * @param mixed $deliveryMethod
     */
    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    /**
     * @return mixed
     */
    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    /**
     * @param mixed $laborDuration
     */
    public function setLaborDuration($laborDuration)
    {
        $this->laborDuration = $laborDuration;
    }

    /**
     * @return mixed
     */
    public function getLaborDuration()
    {
        return $this->laborDuration;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $outcome
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param mixed $timeOfDelivery
     */
    public function setTimeOfDelivery($timeOfDelivery)
    {
        $this->timeOfDelivery = $timeOfDelivery;
    }

    /**
     * @return mixed
     */
    public function getTimeOfDelivery()
    {
        return $this->timeOfDelivery;
    }




} 