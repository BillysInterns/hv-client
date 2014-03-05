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

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $bloodType
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;
    }

    /**
     * @return mixed
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * @param mixed $dateOfDeath
     */
    public function setDateOfDeath($dateOfDeath)
    {
        $this->dateOfDeath = $dateOfDeath;
    }

    /**
     * @return mixed
     */
    public function getDateOfDeath()
    {
        return $this->dateOfDeath;
    }

    /**
     * @param mixed $employmentStatus
     */
    public function setEmploymentStatus($employmentStatus)
    {
        $this->employmentStatus = $employmentStatus;
    }

    /**
     * @return mixed
     */
    public function getEmploymentStatus()
    {
        return $this->employmentStatus;
    }

    /**
     * @param mixed $ethnicity
     */
    public function setEthnicity($ethnicity)
    {
        $this->ethnicity = $ethnicity;
    }

    /**
     * @return mixed
     */
    public function getEthnicity()
    {
        return $this->ethnicity;
    }

    /**
     * @param mixed $highestEducationLevel
     */
    public function setHighestEducationLevel($highestEducationLevel)
    {
        $this->highestEducationLevel = $highestEducationLevel;
    }

    /**
     * @return mixed
     */
    public function getHighestEducationLevel()
    {
        return $this->highestEducationLevel;
    }

    /**
     * @param mixed $isDeceased
     */
    public function setIsDeceased($isDeceased)
    {
        $this->isDeceased = $isDeceased;
    }

    /**
     * @return mixed
     */
    public function getIsDeceased()
    {
        return $this->isDeceased;
    }

    /**
     * @param mixed $isDisabled
     */
    public function setIsDisabled($isDisabled)
    {
        $this->isDisabled = $isDisabled;
    }

    /**
     * @return mixed
     */
    public function getIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @param mixed $isVeteran
     */
    public function setIsVeteran($isVeteran)
    {
        $this->isVeteran = $isVeteran;
    }

    /**
     * @return mixed
     */
    public function getIsVeteran()
    {
        return $this->isVeteran;
    }

    /**
     * @param mixed $maritalStatus
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
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
     * @param mixed $organDonor
     */
    public function setOrganDonor($organDonor)
    {
        $this->organDonor = $organDonor;
    }

    /**
     * @return mixed
     */
    public function getOrganDonor()
    {
        return $this->organDonor;
    }

    /**
     * @param mixed $religon
     */
    public function setReligon($religon)
    {
        $this->religon = $religon;
    }

    /**
     * @return mixed
     */
    public function getReligon()
    {
        return $this->religon;
    }

    /**
     * @param mixed $ssn
     */
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    /**
     * @return mixed
     */
    public function getSsn()
    {
        return $this->ssn;
    }


}