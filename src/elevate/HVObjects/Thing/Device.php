<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 2:15 PM
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

/** @XmlRoot("device") */
class Device extends Thing
{
/**
* @var array elevate\HVObjects\Thing\DataXML\DeviceDataXML
* @Type("elevate\HVObjects\Thing\DataXML\DeviceDataXML")
* @serializedName("data-xml")
*/
    protected $dataXML;
} 