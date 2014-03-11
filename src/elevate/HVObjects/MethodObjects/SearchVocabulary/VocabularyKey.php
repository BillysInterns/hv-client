<?php

namespace elevate\HVObjects\MethodObjects\SearchVocabulary;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\AccessorOrder;


/**
 * @XmlNamespace(uri="http://www.w3.org/2001/XMLSchema", prefix="xml")
 * @XmlRoot("vocabulary-key")
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


//      * @XmlElement(namespace="http://www.w3.org/2001/XMLSchema")


    /**
     * @XmlAttribute(namespace="http://www.w3.org/2001/XMLSchema")
     *
     * @SerializedName("lang")
     * @Type("string")
     *
     */
    private $lang = "en-US";


    public function __construct($name = null, $family = null, $lang = "en-US")
    {
        $this->family = $family;
        $this->name = $name;
        $this->lang = $lang;
    }

}