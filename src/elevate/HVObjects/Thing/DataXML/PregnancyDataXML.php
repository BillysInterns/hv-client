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
 * @AccessorOrder("custom", custom = {"pregnancy", "common"})
 */
class PregnancyDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\PregnancyType")
     * @SerializedName("pregnancy")
     */
    protected $pregnancy;

    /**
     * @param PregnancyType $pregnancy
     * @param Common        $common
     */
    public function __construct(PregnancyType $pregnancy = NULL, Common $common = NULL)
    {
        $this->pregnancy = $pregnancy;
        parent::__construct($common);
    }

    /**
     * @return PregnancyType
     */
    public function getType()
    {
        return $this->pregnancy;
    }

    /**
     * @param PregnancyType $pregnancy
     */
    public function setType(PregnancyType $pregnancy)
    {
        $this->pregnancy = $pregnancy;
    }
} 