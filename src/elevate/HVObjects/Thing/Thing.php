<?php

/**
 * @author ofields
 */

namespace elevate\HVObjects\Thing;

use elevate\HVObjects\Generic\TypeId;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Thing\DataXML\DataXML;
use \elevate\HVObjects\Generic\DataOther;


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
     * @Type("elevate\HVObjects\Generic\TypeId")
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
     //protected $effDate;


    /**
     * @var array elevate\HVObjects\Thing\DataXML\DataXML
     * @Type("array<elevate\HVObjects\Thing\DataXML\DataXML>")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @var \elevate\HVObjects\Generic\DataOther
     * @Type("elevate\HVObjects\Generic\DataOther")
     * @SerializedName("data-other")
     */
    protected $dataOther;

    function __construct($dataXML, $type_id, $thing_id = NULL, $flags = NULL)
    {
        $this->dataXML  = $dataXML;
        $this->flags    = $flags;
        $this->thing_id = $thing_id;
        $this->type_id  = new TypeId(null, $type_id);
        return $this;
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

    /**
     * @param string $flags
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param string $thing_id
     */
    public function setThingId($thing_id)
    {
        $this->thing_id = $thing_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getThingId()
    {
        return $this->thing_id;
    }

    /**
     * @param TypeId $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeId()
    {
        return $this->type_id;
    }



}