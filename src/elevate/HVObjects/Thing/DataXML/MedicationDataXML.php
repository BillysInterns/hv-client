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
use game\XMLObjects\DataXML;
use game\XMLObjects\Thing;

/** @XmlRoot("data-xml") */
class MedicationDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\Type\Medication")
     * @SerializedName("medication")
     */
    protected $medication;

}