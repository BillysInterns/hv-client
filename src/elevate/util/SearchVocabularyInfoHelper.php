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

    /**
     * @param Info $info
     * @return string
     */
    static function HVInfoAsXML($info)
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = $serializer->serialize($info, 'xml');
        return $xml;
    }

    /**
     * Pulls out an associative array from the SearchVocabularyData
     *
     * @param $rawResponse
     * @return array
     */
    static function VocabDataFromXML( $rawResponse )
    {
        $xml = simplexml_load_string( $rawResponse );
        $xml->registerXPathNamespace('wc', 'urn:com.microsoft.wc.methods.response.SearchVocabulary');
        $codeItemsXMLObjects = $xml->xpath('//code-item');

        $vocabData = array();

        foreach ($codeItemsXMLObjects as $group)
        {
            // TODO: Pull in the info here.
        }

        return $vocabData;
    }

    /**
     * @param Info $info
     * @return string
     */
    static function HVInfoAsXML($info)
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = $serializer->serialize($info, 'xml');
        return $xml;
    }

    /**
     * Pulls out an associative array from the SearchVocabularyData
     *
     * @param $rawResponse
     * @return array
     */
    static function VocabDataFromXML( $rawResponse )
    {
        $xml = simplexml_load_string( $rawResponse );
        $xml->registerXPathNamespace('wc', 'urn:com.microsoft.wc.methods.response.SearchVocabulary');
        $codeItemsXMLObjects = $xml->xpath('//code-item');

        $vocabData = array();

        foreach ($codeItemsXMLObjects as $item)
        {
            $newEntry['name'] = (string)$item->{'display-text'};
            $newEntry['code-value'] = (string)$item->{'code-value'};
            $vocabData[] = $newEntry;
        }

        return $vocabData;
    }


}