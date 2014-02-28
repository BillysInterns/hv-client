<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 2:46 PM
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;

use elevate\HVObjects\Thing\DataXML\DietaryIntakeDataXML;

/** @XmlRoot("thing") */
class DietaryIntake extends Thing
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\DietaryIntakeDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(DietaryIntakeDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Dietary Intake');
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