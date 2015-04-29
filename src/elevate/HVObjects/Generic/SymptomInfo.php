<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use elevate\HVObjects\Generic\Extension;

/** @XmlRoot("symptom-info") */
class SymptomInfo 
{
    /**
     * @Type("string")
     */
    public $domain;

    /**
     * @Type("string")
     */
    public $subDomain;

    /**
     * @Type("string")
     */
    public $group;

    /**
     * @Type("string")
     */
    public $symptomType;

    /**
     * @Type("string")
     */
    public $scaleType;

    function __construct($domain = null, $group = null, $subDomain = null, $symptomType = null, $scaleType = null)
    {
        $this->domain      = $domain;
        $this->group       = $group;
        $this->subDomain   = $subDomain;
        $this->symptomType = $symptomType;
        $this->scaleType   = $scaleType;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $subDomain
     */
    public function setSubDomain($subDomain)
    {
        $this->subDomain = $subDomain;
    }

    /**
     * @return mixed
     */
    public function getSubDomain()
    {
        return $this->subDomain;
    }

    /**
     * @param mixed $symptomType
     */
    public function setSymptomType($symptomType)
    {
        $this->symptomType = $symptomType;
    }

    /**
     * @return mixed
     */
    public function getSymptomType()
    {
        return $this->symptomType;
    }

    /**
     * @return mixed
     */
    public function getScaleType()
    {
        return $this->scaleType;
    }

    /**
     * @param mixed $scaleType
     */
    public function setScaleType($scaleType)
    {
        $this->scaleType = $scaleType;
    }




} 