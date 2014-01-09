<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;

use elevate\HVObjects\Thing\DataXML\QuestionAnswerDataXML;

/** @XmlRoot("thing") */
class QuestionAnswer extends Thing
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\QuestionAnswerDataXML")
     * @SerializedName("data-xml")
     */
    protected $dataXML;

    function __construct(QuestionAnswerDataXML $dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Question Answer');
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