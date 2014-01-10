<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;

use elevate\HVObjects\Thing\DataXML\EmotionalStateDataXML;

/** @XmlRoot("thing") */
class EmotionalState extends Thing
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\EmotionalStateDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(EmotionalStateDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Emotional State');
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