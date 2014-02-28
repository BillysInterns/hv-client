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

/** @XmlRoot("additional-nutrition-fact") */
class AdditionalNutritionFact
{

    /**
     * @Type("elevate\HVObjects\Generic\NutritionFact")
     * @SerializedName("nutritionFact")
     */
    protected $nutritionFact;

    function __construct($nutritionFact = NULL)
    {
        $this->nutritionFact = $nutritionFact;
    }

    /**
     * @param mixed $nutritionFact
     */
    public function setNutritionFact($nutritionFact)
    {
        $this->nutritionFact = $nutritionFact;
    }

    /**
     * @return mixed
     */
    public function getNutritionFact()
    {
        return $this->nutritionFact;
    }




} 