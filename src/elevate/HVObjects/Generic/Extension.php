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
use JMS\Serializer\Annotation\XmlKeyValuePairs;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\AccessorOrder;
use elevate\HVObjects\Generic\Repeat;

/**
 * @XmlRoot("extension")
 */
class Extension
{

    /**
     * @XmlAttribute
     * @Type("string")
     */
    public $source;

    // Subclasses will define whatever other data they need once the bug with JMS is fixed

    /**
     * @Type("elevate\HVObjects\Generic\Repeat")
     * @
     */
    public  $repeat;

    /**
     * @Type("string")
     */
    public $domain;

    /**
     * @Type("string")
     */
    public $subdomain;

    /**
     * @Type("boolean")
     */
    public $favorite;

    /**
     * @Type("boolean")
     */
    public  $importance;

    function __construct(
        $importance = NULL, $repeat = NULL, $source = NULL, $favorite = NULL, $domain = NULL, $subdomain = NULL)
    {
        $this->importance = $importance;
        $this->repeat     = $repeat;
        $this->source     = $source;
        $this->favorite   = $favorite;
        $this->domain     = $domain;
        $this->subdomain  = $subdomain;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $subdomain
     */
    public function setSubdomain($subdomain)
    {
        $this->subdomain = $subdomain;
    }

    /**
     * @return mixed
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @param mixed $favorite
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * @return mixed
     */
    public function getFavorite()
    {
        return $this->favorite;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $importance
     */
    public function setImportance($importance)
    {
        $this->importance = $importance;
    }

    /**
     * @return mixed
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * @param mixed $repeat
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * @return mixed
     */
    public function getRepeat()
    {
        return $this->repeat;
    }

} 