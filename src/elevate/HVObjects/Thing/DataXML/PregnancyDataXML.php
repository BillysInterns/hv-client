<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 3/3/14
 * Time: 9:27 AM
 */

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\AccessorOrder;
use PhpCollection\Map;
use PhpCollection\Sequence;

use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\PregnancyType;

/**
 * Class Pregnancy
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"pregnancyType", "common"})
 */
class PregnancyDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\PregnancyType")
     * @SerializedName("pregnancy")
     */
    protected $pregnancyType;

    public function __construct(PregnancyType $pregnancyType = NULL, Common $common = NULL)
    {
        $this->pregnancyType = $pregnancyType;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->dietaryIntakeType;
    }

    public function setType(PregnancyType $pregnancyType)
    {
        $this->$pregnancyType = $pregnancyType;
        return $this;
    }

} 