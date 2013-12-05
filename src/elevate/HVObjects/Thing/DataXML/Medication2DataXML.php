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
use elevate\HVObjects\Thing\DataXML\Type\Medication2Type;
use elevate\HVObjects\Thing\DataXML\DataXML;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Generic\Common;


/** @XmlRoot("data-xml") */
class Medication2DataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\Medication2Type")
     * @SerializedName("medication")
     */
    protected $medication;

    public function __construct(Medication2Type $medication = NULL, Common $common = NULL)
    {
        $this->medication = $medication;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->medication;
    }

    /**
     * @param mixed $medication
     */
    public function setType($medication)
    {
        $this->medication = $medication;
        return $this;
    }


}