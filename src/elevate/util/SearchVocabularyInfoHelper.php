<?php


namespace elevate\util;

use elevate\HVObjects\MethodObjects\SearchVocabulary\Info;
use elevate\HVObjects\MethodObjects\SearchVocabulary\SearchString;
use elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters;
use elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey;

class SearchVocabularyInfoHelper
{

    /**
     * Convenience fn to build the Search object for HV.
     *
     * @param $searchTerm
     * @param string $vocabKey
     * @param string $family
     * @param string $searchType
     * @param string $locale
     * @return Info
     */
    static function getHVInfoForMedicationSearchTerm($searchTerm,
                                                     $vocabKey = 'RxNorm Active Medicines',
                                                     $family = 'RxNorm',
                                                     $searchType = 'Prefix',
                                                     $locale = 'en-US')
    {
        $vocabKey = new VocabularyKey($vocabKey, $family, $locale);
        $searchStr = new SearchString($searchType, $searchTerm);
        $textSearchParam = new TextSearchParameters(10, $searchStr);

        return new Info($textSearchParam, $vocabKey);
    }


}