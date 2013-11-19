<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType;
use elevate\HVObjects\Generic\Common;

class BodyCompositionDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType")
     * @SerializedName("body-composition")
     */
    protected $bodyComposition;

    public function __construct(BodyCompositionType $bodyComposition, Common $common = NULL)
    {
        $this->bodyComposition = $bodyComposition;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->bodyComposition;
    }
} 