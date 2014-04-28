<?php

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use elevate\TypeTranslator;

use elevate\HVObjects\Thing\DataXML\ExerciseDataXML;

/**
 * @XmlRoot("thing")
 *
 */
class Exercise  extends Thing
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\ExerciseDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param $dataXML
     */
    function __construct(ExerciseDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Exercise');
        parent::__construct($dataXML, $typeID);
    }

    /**
     * @param ExerciseDataXML $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return ExerciseDataXML
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }



} 