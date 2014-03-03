<?php

/** author jonfor */

namespace elevate\HVObjects\Generic;

use elevate\HVObjects\Generic\Date\ApproxDate;
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

/** @XmlRoot("family-history-relative") */
class FamilyHistoryRelative
{
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     */
    protected $relationship;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("relative-name")
     */
    protected $relativeName;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("date-of-birth")
     */
    protected $dateBirth;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("date-of-death")
     */
    protected $dateDeath;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("region-of-origin")
     */
    protected $regionOrigin;

    function __construct(
        CodableValue $relationship,
        Person $relativeName = NULL,
        ApproxDate $dateBirth = NULL,
        ApproxDate $dateDeath = NULL,
        CodableValue $regionOrigin = NULL
    )
    {
        $this->relationship = $relationship;
        $this->relativeName = $relativeName;
        $this->dateBirth    = $dateBirth;
        $this->dateDeath    = $dateDeath;
        $this->regionOrigin = $regionOrigin;
    }

    /**
     * @param ApproxDate $dateBirth
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;
    }

    /**
     * @return ApproxDate
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @param ApproxDate $dateDeath
     */
    public function setDateDeath($dateDeath)
    {
        $this->dateDeath = $dateDeath;
    }

    /**
     * @return ApproxDate
     */
    public function getDateDeath()
    {
        return $this->dateDeath;
    }

    /**
     * @param CodableValue $regionOrigin
     */
    public function setRegionOrigin($regionOrigin)
    {
        $this->regionOrigin = $regionOrigin;
    }

    /**
     * @return CodableValue
     */
    public function getRegionOrigin()
    {
        return $this->regionOrigin;
    }

    /**
     * @param CodableValue $relationship
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    }

    /**
     * @return CodableValue
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * @param Person $relativeName
     */
    public function setRelativeName($relativeName)
    {
        $this->relativeName = $relativeName;
    }

    /**
     * @return Person
     */
    public function getRelativeName()
    {
        return $this->relativeName;
    }
}