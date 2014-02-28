<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 10:15 AM
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

/** @XmlRoot("nutrition-fact") */
class NutritionFact
{

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("fact")
     */
    protected $fact;

    function __construct($name, $fact = NULL)
    {
        $this->fact = $fact;
        $this->name = $name;
    }

    /**
     * @param mixed $fact
     */
    public function setFact($fact)
    {
        $this->fact = $fact;
    }

    /**
     * @return mixed
     */
    public function getFact()
    {
        return $this->fact;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }




} 