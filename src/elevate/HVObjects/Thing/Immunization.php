<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:51 PM
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\ImmunizationDataXML;


/** @XmlRoot("immunization") */
class Immunization extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\ImmunizationDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\ImmunizationDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(ImmunizationDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Immunization');
        parent::__construct($dataXML,$typeID);    }


}