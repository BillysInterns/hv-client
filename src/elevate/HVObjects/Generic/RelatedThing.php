<?php
/** @author troussos * */

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class RelatedThing
{


    /**
     * @Type("string")
     * @SerializedName("thing-id")
     */
    protected $thingId;
    /**
     * @Type("string")
     * @SerializedName("version-stamp")
     */
    protected $versionStamp;
    /**
     * @Type("string")
     * @SerializedName("relationship-type")
     */
    protected $relationshipType;

    public function __construct(
        $thingId = NULL,
        $versionStamp = NULL,
        $relationshipType = NULL
    )
    {
        $this->relationshipType = $relationshipType;
        $this->thingId          = $thingId;
        $this->versionStamp     = $versionStamp;
    }

    /**
     * @param mixed $versionStamp
     */
    public function setVersionStamp($versionStamp)
    {
        $this->versionStamp = $versionStamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersionStamp()
    {
        return $this->versionStamp;
    }

    /**
     * @return mixed
     */
    public function getRelationshipType()
    {
        return $this->relationshipType;
    }

    /**
     * @param $relationshipType
     *
     * @return $this
     */
    public function setRelationshipType($relationshipType)
    {
        $this->relationshipType = $relationshipType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getThingId()
    {
        return $this->thingId;
    }

    /**
     * @param $thingId
     *
     * @return $this
     */
    public function setThingId($thingId)
    {
        $this->thingId = $thingId;
        return $this;
    }
}