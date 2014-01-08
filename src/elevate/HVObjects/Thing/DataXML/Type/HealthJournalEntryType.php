<?php
/**
* @author - Sumit
*/

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\CodableValue;

/** @XmlRoot("health-journal-entry") */
class HealthJournalEntryType
{
    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("string")
     * @SerializedName("content")
     */
    protected $content;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("category")
     */
    protected $category;

    /**
     * @param ApproxDateTime $when
     * @param null $category
     * @param CodableValue $content
     */
    function __construct(
        ApproxDateTime $when = NULL, CodableValue $category = NULL, $content = NULL
    )
    {
        $this->category = $category;
        $this->content  = $content;
        $this->when     = $when;
    }

    /**
     * @param CodableValue $category
     */
    public function setCategory(CodableValue $category)
    {
        $this->category = $category;
    }

    /**
     * @return CodableValue|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ApproxDateTime $when
     */
    public function setWhen(ApproxDateTime $when)
    {
        $this->when = $when;
    }

    /**
     * @return ApproxDateTime
     */
    public function getWhen()
    {
        return $this->when;
    }

} 