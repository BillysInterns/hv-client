<?php
/**
 * @author palsumit
 */

namespace elevate\HVObjects\Generic;

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

use elevate\HVObjects\Generic\CodableValue;

/** @XmlRoot("structured-measurement") */
class StructuredMeasurement {


    /**
     * @Type("double")
     * @SerializedName("value")
     */
    protected $value;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("units")
     */
    protected $units;

    /**
     * @param              $value
     * @param CodableValue $units
     */
    public function __construct($value, CodableValue $units = NULL)
    {
        $this->units = $units;
        $this->value = $value;
    }


} 