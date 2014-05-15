<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 5/14/14
 * Time: 3:26 PM
 */

namespace elevate\test\HVObjects\Generic;


use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Language;
use elevate\test\HVObjects\BaseObjectTest;


class LanguageTest extends BaseObjectTest
{
    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath    = __DIR__ . '/../SampleXML/Generic/Language.xml';
        self::$objectNamespace  = 'elevate\HVObjects\Generic\Language';

        $language  = new CodableValue('English');
        $isPrimary = true;

        self::$testObject = new Language($language, $isPrimary);

        parent::setUpBeforeClass();
    }
}
 