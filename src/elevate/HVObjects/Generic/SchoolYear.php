<?php

/**
 * @author jonfor
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;


class SchoolYear
{
    /**
     * @Type("string")
     */
    protected $grade;

    /**
     * @Type("string")
     */
    protected $teacher;

    /**
     * @Type("elevate\HVObjects\Generic\School")
     */
    protected $school;

    public function __construct($grade = NULL, $teacher = NULL, $school = NULL)
    {
        $this->grade = $grade;
        $this->teacher = $teacher;
        $this->school = $school;
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
     * @param string $teacher
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


}