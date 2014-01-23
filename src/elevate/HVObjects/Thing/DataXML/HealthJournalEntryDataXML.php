<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;
use elevate\HVObjects\Thing\DataXML\DataXML;

use elevate\HVObjects\Thing\DataXML\Type\HealthJournalEntryType;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("health-journal-entry")
 * @AccessorOrder("custom", custom = {"healthJournalEntry", "common"})
 */
class HealthJournalEntryDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\HealthJournalEntryType")
     * @SerializedName("health-journal-entry")
     */
    protected $healthJournalEntry;

    /**
     * @param HealthJournalEntryType $healthJournalEntry
     */
    public function setType(HealthJournalEntryType $healthJournalEntry)
    {
        $this->healthJournalEntry = $healthJournalEntry;
    }

    function __construct(HealthJournalEntryType $healthJournalEntry = NULL, Common $common = NULL)
    {
        $this->healthJournalEntry = $healthJournalEntry;
        parent::__construct($common);
    }

    /**
     * @return HealthJournalEntryType
     */
    public function getType()
    {
        return $this->healthJournalEntry;
    }

}