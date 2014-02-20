<?php

namespace elevate\HVObjects\MethodObjects\SearchVocabulary;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\XmlValue;

/** @XmlRoot("search-string") */
class SearchString
{
    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("search-mode")
     */
    protected $searchMode;

    /**
     * @XmlValue
     * @Type("string")
     */
    protected  $searchStr = NULL;

    public function __construct($searchMode, $searchStr)
    {
        $this->searchMode = $searchMode;
        $this->searchStr = $searchStr;
    }

}