<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 10:41 AM
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

/** @XmlRoot("dietary-intake") */
class DietaryIntakeType
{

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("foodItem")
     */
    protected $foodItem;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("servingSize")
     */
    protected $servingSize;

    /**
     * @Type("integer")
     * @SerializedName("servingsConsumed")
     */
    protected $servingsConsumed;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("meal")
     */
    protected $meal;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\FoodEnergy")
     * @SerializedName("energy")
     */
    protected $energy;

    /**
     * @Type("elevate\HVObjects\Generic\FoodEnergy")
     * @SerializedName("energyFromFat")
     */
    protected $energyFromFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("totalFat")
     */
    protected $totalFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("saturatedFat")
     */
    protected $saturatedFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("transFat")
     */
    protected $transFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("monounSaturatedFat")
     */
    protected $monounSaturatedFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("polyunSaturatedFat")
     */
    protected $polyunSaturatedFat;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("protein")
     */
    protected $protein;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("carbohydrates")
     */
    protected $carbohydrates;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("dietaryFiber")
     */
    protected $dietaryFiber;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("sugars")
     */
    protected $sugars;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("soduim")
     */
    protected $soduim;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("cholesterol")
     */
    protected $cholesterol;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("calcium")
     */
    protected $calcium;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("iron")
     */
    protected $iron;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("magnesium")
     */
    protected $magnesium;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("phosphorus")
     */
    protected $phosphorus;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("potassium")
     */
    protected $potassium;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("zinc")
     */
    protected $zinc;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminARAE")
     */
    protected $vitaminARAE;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminE")
     */
    protected $vitaminE;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminD")
     */
    protected $vitaminD;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminC")
     */
    protected $vitaminC;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("thiamin")
     */
    protected $thiamin;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("riboflavin")
     */
    protected $riboflavin;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("niacin")
     */
    protected $niacin;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminB6")
     */
    protected $vitaminB6;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("folateDFE")
     */
    protected $folateDFE;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminB12")
     */
    protected $vitaminB12;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("vitaminK")
     */
    protected $vitaminK;

    /**
     * @Type("elevate\HVObjects\Generic\AdditonalNutritionFact")
     * @SerializedName("additionalNutritionFacts")
     */
    protected $additionalNutritionFacts;

    function __construct(
        $foodItem,
        $calcium = NULL,
        $carbohydrates = NULL,
        $cholesterol = NULL,
        $dietaryFiber = NULL,
        $energy = NULL,
        $energyFromFat = NULL,
        $folateDFE = NULL,
        $additionalNutritionFacts = NULL,
        $iron = NULL,
        $magnesium = NULL,
        $meal = NULL,
        $monounSaturatedFat = NULL,
        $niacin = NULL,
        $phosphorus = NULL,
        $polyunSaturatedFat = NULL,
        $potassium = NULL,
        $protein = NULL,
        $riboflavin = NULL,
        $saturatedFat = NULL,
        $servingsConsumed = NULL,
        $servingSize = NULL,
        $soduim = NULL,
        $sugars = NULL,
        $thiamin = NULL,
        $totalFat = NULL,
        $transFat = NULL,
        $vitaminARAE = NULL,
        $vitaminB12 = NULL,
        $vitaminB6 = NULL,
        $vitaminC = NULL,
        $vitaminD = NULL,
        $vitaminE = NULL,
        $vitaminK = NULL,
        $when = NULL,
        $zinc = NULL
    )
    {
        $this->additionalNutritionFacts = $additionalNutritionFacts;
        $this->calcium                  = $calcium;
        $this->carbohydrates            = $carbohydrates;
        $this->cholesterol              = $cholesterol;
        $this->dietaryFiber             = $dietaryFiber;
        $this->energy                   = $energy;
        $this->energyFromFat            = $energyFromFat;
        $this->folateDFE                = $folateDFE;
        $this->foodItem                 = $foodItem;
        $this->iron                     = $iron;
        $this->magnesium                = $magnesium;
        $this->meal                     = $meal;
        $this->monounSaturatedFat       = $monounSaturatedFat;
        $this->niacin                   = $niacin;
        $this->phosphorus               = $phosphorus;
        $this->polyunSaturatedFat       = $polyunSaturatedFat;
        $this->potassium                = $potassium;
        $this->protein                  = $protein;
        $this->riboflavin               = $riboflavin;
        $this->saturatedFat             = $saturatedFat;
        $this->servingsConsumed         = $servingsConsumed;
        $this->servingSize              = $servingSize;
        $this->soduim                   = $soduim;
        $this->sugars                   = $sugars;
        $this->thiamin                  = $thiamin;
        $this->totalFat                 = $totalFat;
        $this->transFat                 = $transFat;
        $this->vitaminARAE              = $vitaminARAE;
        $this->vitaminB12               = $vitaminB12;
        $this->vitaminB6                = $vitaminB6;
        $this->vitaminC                 = $vitaminC;
        $this->vitaminD                 = $vitaminD;
        $this->vitaminE                 = $vitaminE;
        $this->vitaminK                 = $vitaminK;
        $this->when                     = $when;
        $this->zinc                     = $zinc;
    }

    /**
     * @param mixed $additionalNutritionFacts
     */
    public function setAdditionalNutritionFacts($additionalNutritionFacts)
    {
        $this->additionalNutritionFacts = $additionalNutritionFacts;
    }

    /**
     * @return mixed
     */
    public function getAdditionalNutritionFacts()
    {
        return $this->additionalNutritionFacts;
    }

    /**
     * @param mixed $calcium
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;
    }

    /**
     * @return mixed
     */
    public function getCalcium()
    {
        return $this->calcium;
    }

    /**
     * @param mixed $carbohydrates
     */
    public function setCarbohydrates($carbohydrates)
    {
        $this->carbohydrates = $carbohydrates;
    }

    /**
     * @return mixed
     */
    public function getCarbohydrates()
    {
        return $this->carbohydrates;
    }

    /**
     * @param mixed $cholesterol
     */
    public function setCholesterol($cholesterol)
    {
        $this->cholesterol = $cholesterol;
    }

    /**
     * @return mixed
     */
    public function getCholesterol()
    {
        return $this->cholesterol;
    }

    /**
     * @param mixed $dietaryFiber
     */
    public function setDietaryFiber($dietaryFiber)
    {
        $this->dietaryFiber = $dietaryFiber;
    }

    /**
     * @return mixed
     */
    public function getDietaryFiber()
    {
        return $this->dietaryFiber;
    }

    /**
     * @param mixed $energy
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;
    }

    /**
     * @return mixed
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * @param mixed $energyFromFat
     */
    public function setEnergyFromFat($energyFromFat)
    {
        $this->energyFromFat = $energyFromFat;
    }

    /**
     * @return mixed
     */
    public function getEnergyFromFat()
    {
        return $this->energyFromFat;
    }

    /**
     * @param mixed $folateDFE
     */
    public function setFolateDFE($folateDFE)
    {
        $this->folateDFE = $folateDFE;
    }

    /**
     * @return mixed
     */
    public function getFolateDFE()
    {
        return $this->folateDFE;
    }

    /**
     * @param mixed $foodItem
     */
    public function setFoodItem($foodItem)
    {
        $this->foodItem = $foodItem;
    }

    /**
     * @return mixed
     */
    public function getFoodItem()
    {
        return $this->foodItem;
    }

    /**
     * @param mixed $iron
     */
    public function setIron($iron)
    {
        $this->iron = $iron;
    }

    /**
     * @return mixed
     */
    public function getIron()
    {
        return $this->iron;
    }

    /**
     * @param mixed $magnesium
     */
    public function setMagnesium($magnesium)
    {
        $this->magnesium = $magnesium;
    }

    /**
     * @return mixed
     */
    public function getMagnesium()
    {
        return $this->magnesium;
    }

    /**
     * @param mixed $meal
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;
    }

    /**
     * @return mixed
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param mixed $monounSaturatedFat
     */
    public function setMonounSaturatedFat($monounSaturatedFat)
    {
        $this->monounSaturatedFat = $monounSaturatedFat;
    }

    /**
     * @return mixed
     */
    public function getMonounSaturatedFat()
    {
        return $this->monounSaturatedFat;
    }

    /**
     * @param mixed $niacin
     */
    public function setNiacin($niacin)
    {
        $this->niacin = $niacin;
    }

    /**
     * @return mixed
     */
    public function getNiacin()
    {
        return $this->niacin;
    }

    /**
     * @param mixed $phosphorus
     */
    public function setPhosphorus($phosphorus)
    {
        $this->phosphorus = $phosphorus;
    }

    /**
     * @return mixed
     */
    public function getPhosphorus()
    {
        return $this->phosphorus;
    }

    /**
     * @param mixed $polyunSaturatedFat
     */
    public function setPolyunSaturatedFat($polyunSaturatedFat)
    {
        $this->polyunSaturatedFat = $polyunSaturatedFat;
    }

    /**
     * @return mixed
     */
    public function getPolyunSaturatedFat()
    {
        return $this->polyunSaturatedFat;
    }

    /**
     * @param mixed $potassium
     */
    public function setPotassium($potassium)
    {
        $this->potassium = $potassium;
    }

    /**
     * @return mixed
     */
    public function getPotassium()
    {
        return $this->potassium;
    }

    /**
     * @param mixed $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * @return mixed
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * @param mixed $riboflavin
     */
    public function setRiboflavin($riboflavin)
    {
        $this->riboflavin = $riboflavin;
    }

    /**
     * @return mixed
     */
    public function getRiboflavin()
    {
        return $this->riboflavin;
    }

    /**
     * @param mixed $saturatedFat
     */
    public function setSaturatedFat($saturatedFat)
    {
        $this->saturatedFat = $saturatedFat;
    }

    /**
     * @return mixed
     */
    public function getSaturatedFat()
    {
        return $this->saturatedFat;
    }

    /**
     * @param mixed $servingSize
     */
    public function setServingSize($servingSize)
    {
        $this->servingSize = $servingSize;
    }

    /**
     * @return mixed
     */
    public function getServingSize()
    {
        return $this->servingSize;
    }

    /**
     * @param mixed $servingsConsumed
     */
    public function setServingsConsumed($servingsConsumed)
    {
        $this->servingsConsumed = $servingsConsumed;
    }

    /**
     * @return mixed
     */
    public function getServingsConsumed()
    {
        return $this->servingsConsumed;
    }

    /**
     * @param mixed $soduim
     */
    public function setSoduim($soduim)
    {
        $this->soduim = $soduim;
    }

    /**
     * @return mixed
     */
    public function getSoduim()
    {
        return $this->soduim;
    }

    /**
     * @param mixed $sugars
     */
    public function setSugars($sugars)
    {
        $this->sugars = $sugars;
    }

    /**
     * @return mixed
     */
    public function getSugars()
    {
        return $this->sugars;
    }

    /**
     * @param mixed $thiamin
     */
    public function setThiamin($thiamin)
    {
        $this->thiamin = $thiamin;
    }

    /**
     * @return mixed
     */
    public function getThiamin()
    {
        return $this->thiamin;
    }

    /**
     * @param mixed $totalFat
     */
    public function setTotalFat($totalFat)
    {
        $this->totalFat = $totalFat;
    }

    /**
     * @return mixed
     */
    public function getTotalFat()
    {
        return $this->totalFat;
    }

    /**
     * @param mixed $transFat
     */
    public function setTransFat($transFat)
    {
        $this->transFat = $transFat;
    }

    /**
     * @return mixed
     */
    public function getTransFat()
    {
        return $this->transFat;
    }

    /**
     * @param mixed $vitaminARAE
     */
    public function setVitaminARAE($vitaminARAE)
    {
        $this->vitaminARAE = $vitaminARAE;
    }

    /**
     * @return mixed
     */
    public function getVitaminARAE()
    {
        return $this->vitaminARAE;
    }

    /**
     * @param mixed $vitaminB12
     */
    public function setVitaminB12($vitaminB12)
    {
        $this->vitaminB12 = $vitaminB12;
    }

    /**
     * @return mixed
     */
    public function getVitaminB12()
    {
        return $this->vitaminB12;
    }

    /**
     * @param mixed $vitaminB6
     */
    public function setVitaminB6($vitaminB6)
    {
        $this->vitaminB6 = $vitaminB6;
    }

    /**
     * @return mixed
     */
    public function getVitaminB6()
    {
        return $this->vitaminB6;
    }

    /**
     * @param mixed $vitaminC
     */
    public function setVitaminC($vitaminC)
    {
        $this->vitaminC = $vitaminC;
    }

    /**
     * @return mixed
     */
    public function getVitaminC()
    {
        return $this->vitaminC;
    }

    /**
     * @param mixed $vitaminD
     */
    public function setVitaminD($vitaminD)
    {
        $this->vitaminD = $vitaminD;
    }

    /**
     * @return mixed
     */
    public function getVitaminD()
    {
        return $this->vitaminD;
    }

    /**
     * @param mixed $vitaminE
     */
    public function setVitaminE($vitaminE)
    {
        $this->vitaminE = $vitaminE;
    }

    /**
     * @return mixed
     */
    public function getVitaminE()
    {
        return $this->vitaminE;
    }

    /**
     * @param mixed $vitaminK
     */
    public function setVitaminK($vitaminK)
    {
        $this->vitaminK = $vitaminK;
    }

    /**
     * @return mixed
     */
    public function getVitaminK()
    {
        return $this->vitaminK;
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

    /**
     * @param mixed $zinc
     */
    public function setZinc($zinc)
    {
        $this->zinc = $zinc;
    }

    /**
     * @return mixed
     */
    public function getZinc()
    {
        return $this->zinc;
    }

} 