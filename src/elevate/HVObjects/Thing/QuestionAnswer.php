<?php


namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use game\XMLObjects\Thing;

/** @XmlRoot("thing") */
class QuestionAnswer extends Thing {

    /**
     * @var array elevate\HVObjects\Thing\DataXML\QuestionAnswer
     * @Type("elevate\HVObjects\Thing\DataXML\QuestionAnswer")
     * @serializedName("data-xml")
     */
    protected $dataXML;


}