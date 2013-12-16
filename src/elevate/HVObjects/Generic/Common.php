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
use JMS\Serializer\Annotation\AccessorOrder;
use elevate\HVObjects\Generic\Extension;


use elevate\HVObjects\Generic\RelatedThing;
use PhpCollection\Map;
use PhpCollection\Sequence;
use elevate\HVObjects\Generic\CustomExtension;

/** @XmlRoot("common")
 * @AccessorOrder("custom", custom = {"source", "note", "tags", "extension", "related-thing", "client-thing-id" })
 */
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
     * @Type("array<elevate\HVObjects\Generic\RelatedThing>")
     * @XmlList(inline=true, entry="related-thing")
     */
    protected $relatedThing;
    /**
     * @Type("string")
     * @SerializedName("client-thing-id")
     */
    protected $clientThingId;
    /**
     * @Type("elevate\HVObjects\Generic\Extension")
     * @SerializedName("extension")
     */
    protected $extension;

    public function __construct(
        $note = NULL,
        $source = NULL,
        $tags = NULL,
        array $relatedThing = array(),
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
        return $this;
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
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param array $relatedThing
     *
     * @return $this
     */
    public function setRelatedThing(array $relatedThing)
    {
        $this->relatedThing = $relatedThing;
        return $this;
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
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }



}