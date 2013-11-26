<?php

/**
 * @author arkzero
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
use elevate\HVObjects\Thing\DataXML\Type\AllergyType;

/**
 * Class AllergyDataXML
 * @package elevate\HVObjects\Thing\DataXML
 *
 *
 * @AccessorOrder("custom", custom = {"allergy", "common"})
 */
class AllergyDataXML extends DataXML{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\AllergyType")
     * @SerializedName("allergy")
     */
    protected $allergy;

    function __construct(AllergyType $allergy = NULL, Common $common = NULL)
    {
        $this->allergy = $allergy;
        parent::__construct($common);
    }
    public function getType()
    {
        return $this->allergy;
    }

    /**
     * @param mixed $allergy
     */
    public function setType($allergy)
    {
        $this->allergy = $allergy;
    }


}