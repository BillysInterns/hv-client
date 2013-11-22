<?php
/** @author troussos * */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\Date\ApproxDateTime;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\BodyCompositionValue;

class BodyCompositionType
{
    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("when")
     */
    protected $when;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("measurement-name")
     */
    protected $measurementName;
    /**
     * @Type("elevate\HVObjects\Generic\BodyCompositionValue")
     * @SerializedName("value")
     */
    protected $value;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("measurement-method")
     */
    protected $meaurementMethod = NULL;
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("site")
     */
    protected $site = NULL;

    function __construct(
        ApproxDateTime $when = NULL,
        CodableValue $measurementName = NULL,
        BodyCompositionValue $value = NULL,
        CodableValue $meaurementMethod = NULL,
        CodableValue $site = NULL
    )
    {
        $this->measurementName = $measurementName;
        $this->meaurementMethod = $meaurementMethod;
        $this->site = $site;
        $this->value = $value;
        $this->when = $when;
    }

}