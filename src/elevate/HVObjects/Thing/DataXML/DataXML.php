<?php
namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
class DataXML {

    /**
     * @Type("elevate\HVObjects\Generic\Common")
     * @SerializedName("common")
     */
    protected $common;
}