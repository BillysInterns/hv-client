<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:58 PM
 */

namespace elevate\HVObjects\Thing\DataXML\Type;

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

/** @XmlRoot("immunization") */
class ImmunizationType 
{
    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("administration-date")
     */
    protected $administrationDate;

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("administrator")
     */
    protected $administrator;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("manufacturer")
     */
    protected $manufacturer;

    /**
     * @Type("string")
     * @SerializedName("lot")
     */
    protected $lot;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("route")
     */
    protected $route;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDate")
     * @SerializedName("expiration-date")
     */
    protected $expirationDate;

    /**
     * @Type("string")
     * @SerializedName("sequence")
     */
    protected $sequence;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("anatomic-surface")
     */
    protected $anatomicSurface;

    /**
     * @Type("string")
     * @SerializedName("adverse-event")
     */
    protected $adverseEvent;

    /**
     * @Type("string")
     * @SerializedName("consent")
     */
    protected $consent;
} 