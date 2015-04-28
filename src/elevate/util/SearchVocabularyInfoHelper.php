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
     * @return Info
     */
    static function getHVInfoForMedicationSearchTerm($searchTerm)
    {
        return self::getHVInfoForSearchTerm($searchTerm,'RxNorm Active Medicines','RxNorm' );
    }

    /**
     * Convenience fn to build the Search object for HV.
     *
     * @param $searchTerm
     * @return Info
     */
    static function getHVInfoForConditionSearchTerm($searchTerm)
    {
        return self::getHVInfoForSearchTerm($searchTerm,'icd9cm-reactions','icd' );
    }


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
    static function getHVInfoForSearchTerm($searchTerm,
                                           $vocabKey,
                                           $family,
                                           $searchType = 'Prefix',
                                           $locale = 'en-US')
    {
        $vocabKey = new VocabularyKey($vocabKey, $family, $locale);
        $searchStr = new SearchString($searchType, $searchTerm);
        $textSearchParam = new TextSearchParameters(10, $searchStr);

        return new Info($textSearchParam, $vocabKey);
    }

    /**
     * Pulls out an associative array from the SearchVocabularyData
     *
     * @param $rawResponse
     * @return array
     */
    static function VocabDataFromXML($rawResponse)
    {
        $xml = simplexml_load_string($rawResponse);
        $xml->registerXPathNamespace('wc', 'urn:com.microsoft.wc.methods.response.SearchVocabulary');
        $codeItemsXMLObjects = $xml->xpath('//code-item');

        $vocabData = [];

        foreach ($codeItemsXMLObjects as $item) {
            $newEntry['name'] = (string)$item->{'display-text'};
            $newEntry['code-value'] = (string)$item->{'code-value'};
            $vocabData[] = $newEntry;
        }

        return $vocabData;
    }


}