<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 4:04 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("format") */
class ThingFormatSpec
{

    /**
     * @XmlList(inline = true, entry = "section")
     * @Type("array<string>")
     */
    protected $section;

    /**
     * @Type("string")
     */
    protected $xml = '';

    /**
     * @Type("string")
     */
    protected $typeVersionFormat = NULL;

    function __construct(
        array $section,
        $xml = '',
        $typeVersionFormat = NULL
    )
    {
        $this->section = $section;
        $this->typeVersionFormat = $typeVersionFormat;
        $this->xml = $xml;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $typeVersionFormat
     */
    public function setTypeVersionFormat($typeVersionFormat)
    {
        $this->typeVersionFormat = $typeVersionFormat;
    }

    /**
     * @return mixed
     */
    public function getTypeVersionFormat()
    {
        return $this->typeVersionFormat;
    }

    /**
     * @param mixed $xml
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    /**
     * @return mixed
     */
    public function getXml()
    {
        return $this->xml;
    }

}