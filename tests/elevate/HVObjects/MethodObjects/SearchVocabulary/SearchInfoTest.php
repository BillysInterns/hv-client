<?php

namespace elevate\test\HVObjects\MethodObjects\SearchVocabulary;

use elevate\HVObjects\MethodObjects\SearchVocabulary\Info;

use elevate\HVObjects\MethodObjects\SearchVocabulary\TextSearchParameters;
use elevate\HVObjects\MethodObjects\SearchVocabulary\VocabularyKey;
use elevate\HVObjects\MethodObjects\SearchVocabulary\SearchString;

use elevate\test\HVObjects\BaseObjectTest;

class SearchInfoTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/MethodObjects/SearchVocabulary/Info.xml';
        self::$objectNamespace = 'elevate\HVObjects\MethodObjects\SearchVocabulary\Info';

        $vocabKey = new VocabularyKey('RxNorm Active Medicines', 'RxNorm', 'en-US');
        $searchStr = new SearchString('Prefix', 'Remicade');
        $textSearchParam = new TextSearchParameters(10, $searchStr);

        self::$testObject = new Info($textSearchParam, $vocabKey);
        parent::setUpBeforeClass();
    }
}