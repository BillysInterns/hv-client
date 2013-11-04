<?php


namespace elevate\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\LengthValue;
use elevate\HVObjects\Generic\Date\DateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;
class HeightType
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("when")
     */
    protected $when;

    /**
     * @Type("elevate\HVObjects\Generic\LengthValue")
     * @SerializedName("value")
     */
    protected $value;

    public function __construct(DateTime $when, LengthValue $value)
    {
        $this->when = $when;
        $this->value = $value;
    }
} 