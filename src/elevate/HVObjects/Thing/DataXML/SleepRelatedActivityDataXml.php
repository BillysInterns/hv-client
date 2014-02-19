<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 1:31 PM
 * To change this template use File | Settings | File Templates.
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

use elevate\HVObjects\Thing\DataXML\Type\SleepRelatedActivityType;
use elevate\HVObjects\Generic\Common;

/**
 * Class SleepRelatedActivityDataXml
 * @package elevate\HVObjects\Thing\DataXML
 * @AccessorOrder("custom", custom = {"sleepRelatedActivity", "common"})
 */
class SleepRelatedActivityDataXml extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\SleepRelatedActivityType")
     * @SerializedName("sleep-pm")
     */
    protected $sleepRelatedActivity;

    function __construct(
        SleepRelatedActivityType $sleepRelatedActivity = NULL,
        Common $common = NULL
    )
    {
        $this->sleepRelatedActivity = $sleepRelatedActivity;
        parent::__construct($common);
    }

    public function getType()
    {
        return $this->sleepRelatedActivity;
    }

    /**
     * @param mixed $sleepRelatedActivity
     */
    public function setType($sleepRelatedActivity)
    {
        $this->sleepRelatedActivity = $sleepRelatedActivity;
        return $this;
    }



}
