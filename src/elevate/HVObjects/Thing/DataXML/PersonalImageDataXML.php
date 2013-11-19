<?php


namespace elevate\HVObjects\Thing\DataXML;

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
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;

/** @XmlRoot("data-xml") */
class PersonalImageDataXML extends DataXML
{

    /**
     * @Type("string")
     * @SerializedName("personal-image")
     */
    protected $personalImage;

    public function __construct( $personalImage, Common $common = NULL)
    {
        $this->personalImage = '';
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->personalImage;
    }
} 