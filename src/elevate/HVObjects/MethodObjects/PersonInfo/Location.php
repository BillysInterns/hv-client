<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects\PersonInfo;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;


/** @XmlRoot("location") */
class Location
{

    /**
     * @Type("string")
     */
    protected $country;

    /**
     * @Type("string")
     * @SerializedName("state-province")
     */
    protected $stateProvince;

    function __construct($country, $stateProvince = NULL)
    {
        $this->country = $country;
        $this->stateProvince = $stateProvince;
    }


}