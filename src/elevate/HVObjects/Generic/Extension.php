<?php
/**
 * @author - Sumit
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
use JMS\Serializer\Annotation\AccessorOrder;

use elevate\HVObjects\Generic\CustomExtension;
/**
 * @XmlRoot("extension")
 */
class Extension
{
    /**
     * @Type("elevate\HVObjects\Generic\CustomExtension")
     */
    protected $customExtension;

    function __construct($customExtension = NULL)
    {
        $this->customExtension = $customExtension;
    }

    /**
     * @param mixed $customExtension
     */
    public function setCustomExtension($customExtension)
    {
        $this->customExtension = $customExtension;
    }

    /**
     * @return mixed
     */
    public function getCustomExtension()
    {
        return $this->customExtension;
    }


} 