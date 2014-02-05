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
use elevate\HVObjects\Thing\DataXML\Immunization2DataXML;


/** @XmlRoot("immunization") */
class Immunization2 extends Thing
{
    /**
     * @var array elevate\HVObjects\Thing\DataXML\Immunization2DataXML
     * @Type("elevate\HVObjects\Thing\DataXML\Immunization2DataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(Immunization2DataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Immunization #(v2)');
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

}