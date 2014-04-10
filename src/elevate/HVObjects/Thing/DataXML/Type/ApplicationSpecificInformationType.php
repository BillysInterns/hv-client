<?php
/**
 * @author jonfor
 */
namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("app-specific") */
class ApplicationSpecificInformationType
{
    /**
     * @Type("string")
     * @SerializedName("format-appid")
     */
    protected $formatAppId;

    /**
     * @Type("string")
     * @SerializedName("format-tag")
     */
    protected $formatTag;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("string")
     * @SerializedName("summary")
     */
    protected $summary;

    /**
     * @Type("string")
     * @SerializedName("data")
     */
    protected $data;

    function __construct($formatAppId = NULL, $formatTag = NULL, $summary = NULL, $when = NULL)
    {
        $this->formatAppId = $formatAppId;
        $this->formatTag = $formatTag;
        $this->summary = $summary;
        $this->when = $when;
    }


    /**
     * @param string $formatAppId
     */
    public function setFormatAppId($formatAppId)
    {
        $this->formatAppId = $formatAppId;
    }

    /**
     * @return string
     */
    public function getFormatAppId()
    {
        return $this->formatAppId;
    }

    /**
     * @param string $formatTag
     */
    public function setFormatTag($formatTag)
    {
        $this->formatTag = $formatTag;
    }

    /**
     * @return string
     */
    public function getFormatTag()
    {
        return $this->formatTag;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param DateTime $when
     */
    public function setWhen($when)
    {
        $this->when = $when;
    }

    /**
     * @return DateTime
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }



}