<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 9:28 AM
 */

namespace elevate\HVObjects\Thing;


use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;

use elevate\HVObjects\Thing\DataXML\PregnancyDataXML;

/** @XmlRoot("thing") */
class Pregnancy extends Thing
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\PregnancyDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(PregnancyDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Pregnancy');
        parent::__construct($dataXML,$typeID);
    }

    /**
     * @param array $dataXML
     *
     * @return $this
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

} 