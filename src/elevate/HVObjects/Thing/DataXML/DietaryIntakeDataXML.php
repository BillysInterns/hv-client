<?php
/**
 * Created by PhpStorm.
 * User: alvaroehome
 * Date: 2/28/14
 * Time: 2:21 PM
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
use elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType;


/**
 * Class DietaryIntake
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"dietaryIntakeType", "common"})
 */
class DietaryIntakeDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\DietaryIntakeType")
     * @SerializedName("dietary-intake")
     */
    protected $dietaryIntakeType;

    public function __construct(DietaryIntakeType $dietaryIntakeType = NULL, Common $common = NULL)
    {
        $this->dietaryIntakeType = $dietaryIntakeType;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->dietaryIntakeType;
    }

    /**
     * @param mixed $weight
     */
    public function setType(DietaryIntakeType $dietaryIntakeType)
    {
        $this->dietaryIntakeType = $dietaryIntakeType;
        return $this;
    }




} 