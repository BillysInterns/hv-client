<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 1:31 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\HVObjects\Thing\Thing;


/** @XmlRoot("thing") */
class SleepRelatedActivity extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\SleepRelatedActivity
     * @Type("elevate\HVObjects\Thing\DataXML\SleepRelatedActivity")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }



}