<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 1:17 AM
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

/** @XmlRoot("approx-date-time") */
class ApproxDateTime {

    /**
     * @Type("elevate\HVObjects\Generic\StructuredApproxDate")
     * @SerializedName("structuredApproxDate")
     */
    protected $structured;

    /**
     * @Type("string")
     * @SerializedName("descriptive")
     */
    protected $descriptive;

} 