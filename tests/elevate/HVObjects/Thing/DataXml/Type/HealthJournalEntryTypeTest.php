<?php
    /**
    @author - Sumit
     */

    namespace elevate\test\HVObjects\Thing\DataXML\Type;

    use elevate\HVObjects\Thing\DataXML\Type\HealthJournalEntryType;
    use elevate\test\HVObjects\BaseObjectTest;
    use elevate\HVObjects\Generic\Date\Time;
    use elevate\HVObjects\Generic\Date\ApproxDate;
    use elevate\HVObjects\Generic\Date\ApproxDateTime;
    use elevate\HVObjects\Generic\Date\StructuredApproxDate;
    use elevate\HVObjects\Generic\CodableValue;
    use elevate\HVObjects\Generic\CodedValue;

    class HealthJournalEntryTypeTest extends BaseObjectTest
    {
        public static function setUpBeforeClass()
        {
            self::$sampleXMLPath    = __DIR__ . "/../../../SampleXML/Thing/DataXml/Type/HealthJournalEntryType.xml";
            self::$objectNamespace  = 'elevate\HVObjects\Thing\DataXml\Type\HealthJournalEntryType';

            //When
            $whenTime = new Time(4, 0, 0, 0);
            $whenDate = new ApproxDate(2013, 10, 12);
            $whenTZ = new CodableValue('New York', array());
            $whenStructured = new StructuredApproxDate($whenDate, $whenTime, $whenTZ);
            $when = new ApproxDateTime($whenStructured, 'First Observed Date');

            //Category
            $categoryCode = new CodedValue("234", "category", array("category"), array("Version 5"));
            $category = new CodableValue("Hives", array($categoryCode));

            //Content
            $content = 'content';

            self::$testObject = new HealthJournalEntryType($when, $category, $content);

            parent::setUpBeforeClass();
        }
    }