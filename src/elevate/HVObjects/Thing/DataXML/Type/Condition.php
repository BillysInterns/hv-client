<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 11:32 AM
 * To change this template use File | Settings | File Templates.
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


/** @XmlRoot("common") */
class Condition
{

    /**
     * @Type("elevate\HVObjects\GenericTypes\CodableValue")
     * @SerializedName("name")
     */
    protected $name;
    /**
     * @Type("elevate\HVObjects\Date\DateTime")
     * @SerializedName("onset-date")
     */
    protected $onsetDate;
    /**
     * @Type("elevate\HVObjects\GenericTypes\CodableValue")
     * SerializedName("status")
     */
    protected $status;
    /**
     * @Type("elevate\HVObjects\Date\DateTime")
     * @SerializedName("stop-date")
     */
    protected $stopDate;
    /**
     * @Type("string")
     * @SerializedName("stop-reason")
     */
    protected $stopReason;
}