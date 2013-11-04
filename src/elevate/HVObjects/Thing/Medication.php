<?php

namespace elevate\HVObjects\Thing;


use JMS\Serializer\Annotation\XmlRoot;


/** @XmlRoot("medication") */
class Medication extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\Medication
     * @Type("elevate\HVObjects\Thing\DataXML\Medication")
     * @serializedName("data-xml")
     */
    protected $dataXML;
}