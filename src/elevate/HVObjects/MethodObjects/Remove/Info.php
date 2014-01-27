<?php
/** @author troussos **/

namespace elevate\HVObjects\MethodObjects\Remove;


use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use elevate\HVObjects\Generic\ThingId;

/** @XmlRoot("info") */
class Info
{

    /**
     * @XmlList(inline = true, entry = "thing-id")
     * @Type("array<elevate\HVObjects\Generic\ThingId>")
     */
    protected $ids;

    function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    /**
     * @param $ids
     *
     * @return $this
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }


}