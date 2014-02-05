<?php
/** @author troussos **/

namespace elevate\HVObjects\Generic;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

use elevate\HVObjects\Generic\PersonId;

/** @XmlRoot("created") */
class Created 
{

    /**
     * @Type("string")
     * @SerializedName("timestamp")
     */
    protected $timestamp;

    /**
     * @Type("string")
     * @SerializedName("audit-action")
     */
    protected $auditAction;

    /**
     * @Type("elevate\HVObjects\Generic\PersonId")
     * @SerializedName("person-id")
     */
    protected $personId;

    function __construct($auditAction, $personId, $timestamp)
    {
        $this->auditAction = $auditAction;
        $this->personId    = $personId;
        $this->timestamp   = $timestamp;
    }

    /**
     * @param $auditAction
     *
     * @return $this
     */
    public function setAuditAction($auditAction)
    {
        $this->auditAction = $auditAction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuditAction()
    {
        return $this->auditAction;
    }

    /**
     * @param $personId
     *
     * @return $this
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @return PersonId
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param $timestamp
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}