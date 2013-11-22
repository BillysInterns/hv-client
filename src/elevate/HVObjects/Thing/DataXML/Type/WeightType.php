<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\WeightValue;
class WeightType 
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\WeightValue")
     * @SerializedName("value")
     */
    protected $value;

    public function __construct(DateTime $when = NULL, WeightValue $value = NULL)
    {
        $this->when = $when;
        $this->value = $value;
    }
} 