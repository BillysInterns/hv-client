<?php


namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;

/** @XmlRoot("common") */
class Common 
{

    /**
     * @Type("string")
     * @SerializedName("note")
     */
    protected $note;

    /**
     * @Type("string")
     * @SerializedName("source")
     */
    protected $source;

    /**
     * @Type("string")
     * @SerializedName("tags")
     */
    protected $tags;

    /**
     * @Type("string")
     * @SerializedName("related-thing") //TODO NEED TO CREATE RELATED THING TYPE
     */
    protected $relatedThing;

    /**
     * @Type("string")
     * @SerializedName("client-thing-id")
     */
    protected $clientThingId;

    /**
     * @Type("string")
     * @SerializedName("extension")
     */
    protected $extension;

    public function __construct(
        $note = null,
        $source = null,
        $tags = null,
        $relatedThing = null,
        $clientThingId = null,
        $extension = null
    )
    {
        $this->note = $note;
        $this->source = $source;
        $this->tags = $tags;
        $this->relatedThing = $relatedThing;
        $this->clientThingId = $clientThingId;
        $this->extension = $extension;
    }

}