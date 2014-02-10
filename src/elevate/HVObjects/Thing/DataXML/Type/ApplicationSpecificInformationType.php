<?php
/**
 * @author jonfor
 */
namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\School;
use elevate\HVObjects\Generic\SchoolYear;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("application-specific-information") */
class ApplicationSpecificInformationType
{
    /**
     * @Type("string")
     * @SerializedName("format-app-id")
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
     * @Type("elevate\HVObjects\Generic\SchoolYear")
     * @SerializedName("school-year")
     */
    protected $schoolYear;

    /**
     * @Type("elevate\HVObjects\Generic\School")
     * @SerializedName("school")
     */
    protected $school;

    function __construct(
        $formatAppId = NULL,
        $formatTag = NULL,
        DateTime $when = NULL,
        $summary = NULL,
        SchoolYear $schoolYear = NULL,
        School $school = NULL
    )
    {
        $this->formatAppId = $formatAppId;
        $this->formatTag = $formatTag;
        $this->when = $when;
        $this->summary = $summary;
        $this->schoolYear = $schoolYear;
        $this->school = $school;
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
     * @param School $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return School
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param SchoolYear $schoolYear
     */
    public function setSchoolYear($schoolYear)
    {
        $this->schoolYear = $schoolYear;
    }

    /**
     * @return SchoolYear SchoolYear
     */
    public function getSchoolYear()
    {
        return $this->schoolYear;
    }


}