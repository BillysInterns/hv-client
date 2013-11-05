<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/4/13
 * Time: 2:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;

use elevate\HVObjects\Thing\Thing;

/** @XmlRoot("thing") */
class SleepSession extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\SleepSessionDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\SleepSessionDataXml")
     * @serializedName("data-xml")
     */
    protected $dataXML;

    function __construct($dataXML)
    {
        $typeID = TypeTranslator::lookupTypeID('Sleep Session');
        parent::__construct($dataXML, $typeID);
    }

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