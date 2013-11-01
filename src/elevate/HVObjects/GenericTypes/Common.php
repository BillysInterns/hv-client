<?php


namespace elevate\HVObjects\GenericTypes;

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

}