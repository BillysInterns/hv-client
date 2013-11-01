<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 2:20 PM
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
use PhpCollection\Map;
use PhpCollection\Sequence;
use game\XMLObjects\DataXML;
use game\XMLObjects\Thing;


class Condition extends DataXML{

    /**
     * @Type("elevate\HVObjects\Thing\Type\Condition")
     * @SerializedName("condition")
     */
    protected $condition;
}