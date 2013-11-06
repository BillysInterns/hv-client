<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\CodableValue;

class PersonalDemographicInformationType 
{

    /**
     * @Type("elevate\HVObjects\Generic\Name")
     * @SerializedName("name")
     */
    protected $name = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("birthdate")
     */
    protected $birthdate = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("blood-type")
     */
    protected $bloodType = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("ethnicity")
     */
    protected $ethnicity = NULL;

    /**
     * @Type("string")
     * @SerializedName("ssn")
     */
    protected $ssn = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("marital-status")
     */
    protected $maritalStatus = NULL;

    /**
     * @Type("string")
     * @SerializedName("employment-status")
     */
    protected $employmentStatus = NULL;

    /**
     * @Type("boolean")
     * @SerializedName("is-deceased")
     */
    protected $isDeceased = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("date-of-death")
     */
    protected $dateOfDeath = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("religon")
     */
    protected $religon = NULL;

    /**
     * @Type("boolean")
     * @SerializedName("is-veteran")
     */
    protected $isVeteran = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("highest-education-level")
     */
    protected $highestEducationLevel = NULL;

    /**
     * @Type("boolean")
     * @SerializedName("is-disabled")
     */
    protected $isDisabled = NULL;

    /**
     * @Type("string")
     * @SerializedName("organ-donor")
     */
    protected $organDonor = NULL;

    function __construct(
        Name $name = NULL,
        DateTime $birthdate = NULL,
        CodableValue $bloodtype = NULL,
        CodableValue $ethnicity = NULL,
        $ssn = NULL,
        CodableValue $maritalStatus = NULL,
        $employmentStatus = NULL,
        $isDeceased = NULL,
        DateTime $dateOfDeath = NULL,
        CodableValue $religon = NULL,
        $isVeteran = NULL,
        CodableValue $highestEducationLevel = NULL,
        $isDisabled = NULL,
        $organDonor = NULL
    )
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->bloodType = $bloodtype;
        $this->ethnicity = $ethnicity;
        $this->ssn = $ssn;
        $this->maritalStatus = $maritalStatus;
        $this->isDeceased = $isDeceased;
        $this->dateOfDeath = $dateOfDeath;
        $this->religon = $religon;
        $this->isVeteran = $isVeteran;
        $this->highestEducationLevel = $highestEducationLevel;
        $this->isDisabled = $isDisabled;
        $this->organDonor = $organDonor;
    }

}