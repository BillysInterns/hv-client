<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 2:20 PM
 * To change this template use File | Settings | File Templates.
 */

namespace game\XMLObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use game\XMLObjects\Thing;

/** @XmlRoot("thing") */
class Condition extends Thing{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\Condition
     * @Type("elevate\HVObjects\Thing\DataXML\Condition")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    /**
     * @param array $dataXML
     */
    public function setDataXML($dataXML)
    {
        $this->dataXML = $dataXML;
    }

    /**
     * @return array
     */
    public function getDataXML()
    {
        return $this->dataXML;
    }




}