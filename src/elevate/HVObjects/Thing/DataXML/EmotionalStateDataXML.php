<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;


use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\EmotionalStateType;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\AccessorOrder;

/**
 * Class EmotionalStateDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"emotionalStateType", "common"})
 */
class EmotionalStateDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\EmotionalStateType")
     * @SerializedName("emotionalStateType")
     */
    protected $emotionalStateType;

    function __construct(EmotionalStateType $emotionalStateType = NULL, Common $common = NULL)
    {
        $this->emotionalStateType = $emotionalStateType;
        $this->common = $common;
    }

    /**
     * @param EmotionalStateType $emotionalStateType
     *
     * @return $this
     */
    public function setType(EmotionalStateType $emotionalStateType)
    {
        $this->emotionalStateType = $emotionalStateType;
        return $this;
    }

    /**
     * @return \elevate\HVObjects\Thing\DataXML\Type\EmotionalStateType
     */
    public function getType()
    {
        return $this->emotionalStateType;
    }
} 