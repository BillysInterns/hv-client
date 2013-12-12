<?php
/** @author troussos **/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class RelatedThing 
{


    /**
     * @Type("elevate\HVObjects\Generic\ThingId")
     * @SerializedName("thing-id")
     */
    protected $thingId;

    /**
     * @Type("string")
     * @SerializedName("client-thing-id")
     */
    protected $clientThingId;

    /**
     * @Type("string")
     * @SerializedName("relationship-type")
     */
    protected $relationshipType;

    public function __construct($thingId = NULL, $relationshipType = NULL, $clientThingId = NULL)
    {
        $this->clientThingId    = $clientThingId;
        $this->relationshipType = $relationshipType;
        $this->thingId          = $thingId;
    }

    /**
     * @param $clientThingId
     *
     * @return $this
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
    public function getRelationshipType()
    {
        return $this->relationshipType;
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

    /**
     * @return mixed
     */
    public function getThingId()
    {
        return $this->thingId;
    }
}