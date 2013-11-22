<?php
/**
 * @author arkzero
 */
namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Date\DateTime;
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


/** @XmlRoot("allergy") */
class AllergyType
{

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("reaction")
     */
    protected $reaction;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("first-observed")
     */
    protected $firstObserved;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("allergen-type")
     */
    protected $allergenType;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("allergen-code")
     */
    protected $allergenCode;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("treatment-provider")
     */
    protected $treatmentProvider;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("treatment")
     */
    protected $treatment;

    /**
     * @Type("boolean")
     * @SerializedName("is-negated")
     */
    protected $isNegated;

    function __construct(
        CodableValue $name = NULL,
        CodableValue $reaction = NULL,
        DateTime $firstObserved = NULL,
        CodableValue $allergenType = NULL,
        CodableValue $allergenCode = NULL,
        Person $treatmentProvider = NULL,
        CodableValue $treatment = NULL,
        $isNegated = NULL
    )
    {
        $this->name = $name;
        $this->reaction = $reaction;
        $this->firstObserved = $firstObserved;
        $this->allergenType = $allergenType;
        $this->allergenCode = $allergenCode;
        $this->treatmentProvider = $treatmentProvider;
        $this->treatment = $treatment;
        $this->isNegated = $isNegated;
    }

    /**
     * @param mixed $allergenCode
     */
    public function setAllergenCode($allergenCode)
    {
        $this->allergenCode = $allergenCode;
    }

    /**
     * @return mixed
     */
    public function getAllergenCode()
    {
        return $this->allergenCode;
    }

    /**
     * @param mixed $allergenType
     */
    public function setAllergenType($allergenType)
    {
        $this->allergenType = $allergenType;
    }

    /**
     * @return mixed
     */
    public function getAllergenType()
    {
        return $this->allergenType;
    }

    /**
     * @param mixed $firstObserved
     */
    public function setFirstObserved($firstObserved)
    {
        $this->firstObserved = $firstObserved;
    }

    /**
     * @return mixed
     */
    public function getFirstObserved()
    {
        return $this->firstObserved;
    }

    /**
     * @param mixed $isNegated
     */
    public function setIsNegated($isNegated)
    {
        $this->isNegated = $isNegated;
    }

    /**
     * @return mixed
     */
    public function getIsNegated()
    {
        return $this->isNegated;
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

    /**
     * @param mixed $reaction
     */
    public function setReaction($reaction)
    {
        $this->reaction = $reaction;
    }

    /**
     * @return mixed
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * @param mixed $treatment
     */
    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;
    }

    /**
     * @return mixed
     */
    public function getTreatment()
    {
        return $this->treatment;
    }

    /**
     * @param mixed $treatmentProvider
     */
    public function setTreatmentProvider($treatmentProvider)
    {
        $this->treatmentProvider = $treatmentProvider;
    }

    /**
     * @return mixed
     */
    public function getTreatmentProvider()
    {
        return $this->treatmentProvider;
    }
}