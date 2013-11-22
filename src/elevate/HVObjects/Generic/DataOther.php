<?php

/**
 * @author ofields
 */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Generic\Common;
use JMS\Serializer\Annotation\XmlValue;

/** @XmlRoot("data-other") */
class DataOther
{

    /**
     * @var string
     * @XmlValue
     * @Type("string")
     */
    private $data;

    /**
     * @var string
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("content-type")
     */
    private $contentType;

    /**
     * @var string
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("content-encoding")
     */
    private $contentEncoding;

    /**
     * @param string $contentEncoding
     */
    public function setContentEncoding($contentEncoding)
    {
        $this->contentEncoding = $contentEncoding;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentEncoding()
    {
        return $this->contentEncoding;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }



}