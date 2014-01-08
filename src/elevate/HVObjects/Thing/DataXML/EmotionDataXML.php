<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;


use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\EmotionType;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\AccessorOrder;

/**
 * Class EmotionDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 * @AccessorOrder("custom", custom = {"emotionType", "common"})
 */
class EmotionDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\EmotionType")
     * @SerializedName("emotion")
     */
    protected $emotionType;

    function __construct(EmotionType $emotionType = NULL, Common $common = NULL)
    {
        $this->emotionType = $emotionType;
        $this->common = $common;
    }

    /**
     * @param EmotionType $emotionType
     *
     * @return $this
     */
    public function setEmotionType(EmotionType $emotionType)
    {
        $this->emotionType = $emotionType;
        return $this;
    }

    /**
     * @return \elevate\HVObjects\Thing\DataXML\Type\EmotionType
     */
    public function getEmotionType()
    {
        return $this->emotionType;
    }
} 