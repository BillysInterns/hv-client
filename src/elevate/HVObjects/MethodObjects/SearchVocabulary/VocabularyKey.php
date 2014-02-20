<?php

namespace elevate\HVObjects\MethodObjects\SearchVocabulary;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;


/**
 * @XmlRoot("vocabulary-key")
 * @XmlNamespace(uri="http://www.w3.org/2001/XMLSchema", prefix="xml")
 */
class VocabularyKey
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("family")
     */
    protected $family;


    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("lang")
     * @XmlElement(namespace="http://www.w3.org/2001/XMLSchema")
     */
    private $xmlLang = NULL;


    public function __construct($name = null, $family = null, $xmlLang = "en-US")
    {
        $this->family = $family;
        $this->name = $name;
        $this->xmlLang = $xmlLang;
    }

}