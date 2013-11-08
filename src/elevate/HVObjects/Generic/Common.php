<?php

/**
 * @author troussos
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

    /**
     * @param mixed $clientThingId
     */
    public function setClientThingId($clientThingId)
    {
        $this->clientThingId = $clientThingId;
    }

    /**
     * @return mixed
     */
    public function getClientThingId()
    {
        return $this->clientThingId;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $relatedThing
     */
    public function setRelatedThing($relatedThing)
    {
        $this->relatedThing = $relatedThing;
    }

    /**
     * @return mixed
     */
    public function getRelatedThing()
    {
        return $this->relatedThing;
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
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }



}