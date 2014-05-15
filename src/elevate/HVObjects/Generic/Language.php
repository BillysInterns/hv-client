<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\CodableValue;

/** @XmlRoot("language") */
class Language 
{
    /**
     * @param CodableValue $language
     * @param bool $isPrimary
     */
    function __construct(CodableValue $language, $isPrimary = false)
    {
        $this->isPrimary = $isPrimary;
        $this->language  = $language;
    }

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("language")
     */
    protected $language;

    /**
     * @Type("boolean")
     * @SerializedName("is-primary")
     */
    protected $isPrimary;

    /**
     * @param mixed $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return mixed
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
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
}