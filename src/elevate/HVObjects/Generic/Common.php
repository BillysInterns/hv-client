<?php


namespace elevate\HVObjects\Generic;

use Doctrine\Common\Collections\ArrayCollection;

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
        $note = NULL,
        $source = NULL,
        $tags = NULL,
        $relatedThing = NULL,
        $clientThingId = NULL,
        $extension = NULL
    )
    {
        $this->note          = $note;
        $this->source        = $source;
        $this->tags          = $tags;
        $this->relatedThing  = $relatedThing;
        $this->clientThingId = $clientThingId;
        $this->extension     = $extension;
    }

}