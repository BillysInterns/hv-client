<?php
/**
 * @author jonfor
 */
namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("app-specific") */
class ApplicationSpecificInformationType
{
    /**
     * @Type("string")
     * @SerializedName("format-appid")
     */
    protected $formatAppId;

    /**
     * @Type("string")
     * @SerializedName("format-tag")
     */
    protected $formatTag;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("string")
     * @SerializedName("summary")
     */
    protected $summary;

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\SchoolType")
     * @SerializedName("school")
     */
    protected $school;

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\SchoolYearType")
     * @SerializedName("school-year")
     */
    protected $schoolYear;

    function __construct($formatAppId, $formatTag, $school, $schoolYear, $summary, $when)
    {
        $this->formatAppId = $formatAppId;
        $this->formatTag = $formatTag;
        $this->school = $school;
        $this->schoolYear = $schoolYear;
        $this->summary = $summary;
        $this->when = $when;
    }


    /**
     * @param string $formatAppId
     */
    public function setFormatAppId($formatAppId)
    {
        $this->formatAppId = $formatAppId;
    }

    /**
     * @return string
     */
    public function getFormatAppId()
    {
        return $this->formatAppId;
    }

    /**
     * @param string $formatTag
     */
    public function setFormatTag($formatTag)
    {
        $this->formatTag = $formatTag;
    }

    /**
     * @return string
     */
    public function getFormatTag()
    {
        return $this->formatTag;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param DateTime $when
     */
    public function setWhen($when)
    {
        $this->when = $when;
    }

    /**
     * @return DateTime
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * @param mixed $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param mixed $schoolYear
     */
    public function setSchoolYear($schoolYear)
    {
        $this->schoolYear = $schoolYear;
    }

    /**
     * @return mixed
     */
    public function getSchoolYear()
    {
        return $this->schoolYear;
    }
}