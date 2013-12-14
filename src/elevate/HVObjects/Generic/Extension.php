<?php
/**
 * @author - Sumit
 */

namespace elevate\HVObjects\Generic;

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