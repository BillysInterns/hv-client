<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\DataXML\HealthJournalEntryDataXML;
use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */
class HealthJournalEntry 
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\HealthJournalEntryDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\HealthJournalEntryDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param HealthJournalEntryDataXML $dataXML
     */
    function __construct(HealthJournalEntryDataXML $dataXML = NULL)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

} 