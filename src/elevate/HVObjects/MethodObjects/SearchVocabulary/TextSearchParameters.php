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

use elevate\HVObjects\MethodObjects\SearchVocabulary\SearchString;

/** @XmlRoot("text-search-parameters") */
class TextSearchParameters
{

    /**
     * @var SearchString
     * @Type("elevate\HVObjects\MethodObjects\SearchVocabulary\SearchString")
     * @SerializedName("search-string")
     */
    protected $searchString;

    /**
     * @var string
     * @Type("integer")
     * @SerializedName("max-results")
     */
    protected $maxResults;

    public function __construct($maxResults, $searchString)
    {
        $this->maxResults = $maxResults;
        $this->searchString = $searchString;
    }


}
