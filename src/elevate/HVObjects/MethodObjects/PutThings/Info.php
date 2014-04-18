<?php
/** @author troussos */

namespace elevate\HVObjects\MethodObjects\PutThings;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("info") */
class Info
{

    /**
     * @XmlList(inline = true, entry = "thing")
     * @Type("array<elevate\HVObjects\Thing\Thing>")
     */
    protected $things;

    public function __construct(array $things)
    {
        $this->things = $things;
        return $this;
    }

    /**
     * @param mixed $things
     */
    public function setThings($things)
    {
        $this->things = $things;
    }

    /**
     * @return mixed
     */
    public function getThings()
    {
        return $this->things;
    }

}