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

use \elevate\HVObjects\Generic\Person;

/** @XmlRoot("school-year") */
class SchoolYearType
{
    /**
     * @Type("string")
     */
    protected $grade;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     */
    protected $teacher;

    public function __construct($grade = NULL, $teacher = NULL)
    {
        $this->grade = $grade;
        $this->teacher = $teacher;
    }

    /**
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param Person $teacher
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @return string
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}