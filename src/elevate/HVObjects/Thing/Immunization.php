<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:51 PM
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;


/** @XmlRoot("immunization") */
class Immunization extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\ImmunizationDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\ImmunizationDataXML")
     * @serializedName("data-xml")
     */
    protected $dataXML;
}