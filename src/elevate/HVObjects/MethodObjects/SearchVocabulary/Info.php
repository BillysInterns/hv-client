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

use elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey;
use elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters;

/** @XmlRoot("info") */
class Info
{

    /**
     * @var VocabularyKey
     * @Type("elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey")
     * @SerializedName("vocabulary-key")
     */
    protected $vocabularyKey;

    /**
     * @var TextSearchParameters
     * @Type("elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters")
     * @SerializedName("text-search-parameters")
     */
    protected $textSearchParameters;


    function __construct($textSearchParameters, $vocabularyKey)
    {
        $this->textSearchParameters = $textSearchParameters;
        $this->vocabularyKey = $vocabularyKey;
    }

    /**
     * @param \elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters $textSearchParameters
     */
    public function setTextSearchParameters($textSearchParameters)
    {
        $this->textSearchParameters = $textSearchParameters;
    }

    /**
     * @return \elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters
     */
    public function getTextSearchParameters()
    {
        return $this->textSearchParameters;
    }

    /**
     * @param \elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey $vocabularyKey
     */
    public function setVocabularyKey($vocabularyKey)
    {
        $this->vocabularyKey = $vocabularyKey;
    }

    /**
     * @return \elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey
     */
    public function getVocabularyKey()
    {
        return $this->vocabularyKey;
    }


}
