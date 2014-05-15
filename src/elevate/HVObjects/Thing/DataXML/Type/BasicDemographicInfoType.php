<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\CodableValue;

class BasicDemographicInfoType
{
    /**
     * @Type("string")
     * @SerializedName("gender")
     */
    protected $gender;

    /**
     * @Type("string")
     * @SerializedName("birthyear")
     */
    protected $birthYear;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("country")
     */
    protected $country;

    /**
     * @Type("string")
     * @SerializedName("postcode")
     */
    protected $postcode;

    /**
     * @Type("string")
     * @SerializedName("city")
     */
    protected $city;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("state")
     */
    protected $state;

    /**
     * @Type("string")
     * @SerializedName("firstdow")
     */
    protected $firstDow;

    /**
     * @Type("elevate\HVObjects\Generic\Language")
     * @SerializedName("language")
     */
    protected $language;

    function __construct($gender, $birthYear, $city, $country, $firstDow, $language, $postcode,
                         $state)
    {
        $this->birthYear = $birthYear;
        $this->city      = $city;
        $this->country   = $country;
        $this->firstDow  = $firstDow;
        $this->gender    = $gender;
        $this->language  = $language;
        $this->postcode  = $postcode;
        $this->state     = $state;
    }

    /**
     * @param mixed $birthYear
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;
    }

    /**
     * @return mixed
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $firstDow
     */
    public function setFirstDow($firstDow)
    {
        $this->firstDow = $firstDow;
    }

    /**
     * @return mixed
     */
    public function getFirstDow()
    {
        return $this->firstDow;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

} 