<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\AccessorOrder;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType;
use elevate\HVObjects\Generic\Common;

/**
 * Class BodyCompositionDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"body-composition", "common"})
 */
class BodyCompositionDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\BodyCompositionType")
     * @SerializedName("body-composition")
     */
    protected $bodyComposition;

    public function __construct(BodyCompositionType $bodyComposition = NULL, Common $common = NULL)
    {
        $this->bodyComposition = $bodyComposition;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->bodyComposition;
    }

    /**
     * @param mixed $bodyComposition
     */
    public function setType($bodyComposition)
    {
        $this->bodyComposition = $bodyComposition;
        return $this;
}


} 