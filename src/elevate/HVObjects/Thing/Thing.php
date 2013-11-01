<?php


namespace game\XMLObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use game\XMLObjects\DataXML;

/** @XmlRoot("thing") */
class Thing {

    /**
     * @var string
     * @Type("string")
     * @SerializedName("thing-id")
     */
    protected $thing_id;


    /**
     * @var string
     * @Type("PhpCollection\Map<string,string>")
     * @XmlMap(keyAttribute = "name")
     * @SerializedName("type-id")
     */
    protected $type_id;


    /**
     * @var string
     * @Type("string")
     */
    protected $flags;

    /**
     * @Type("DateTime<'DATE_ISO8601'>")
     * @SerializedName("eff-date")
     */
    // protected $effDate;


    /**
     * @var array game\XMLObjects\DataXML
     * @Type("game\XMLObjects\DataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;





}