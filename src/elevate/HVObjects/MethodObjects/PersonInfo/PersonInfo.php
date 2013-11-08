<?php

/**
 * @author troussos
 */

namespace elevate\HVObjects\MethodObjects\PersonInfo;

use elevate\HVObjects\MethodObjects\PersonInfo\AppSettings;
use elevate\HVObjects\MethodObjects\PersonInfo\Record;
use elevate\HVObjects\MethodObjects\PersonInfo\HVGroups;
use elevate\HVObjects\MethodObjects\PersonInfo\Culture;
use elevate\HVObjects\MethodObjects\PersonInfo\Location;
use elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermissionList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;


/** @XmlRoot("person-info") */
class PersonInfo
{

    /**
     * @Type("string")
     * @SerializedName("person-id")
     */
    protected $personId;

    /**
     * @Type("string")
     */
    protected $name;

    /**
     * @Type("string")
     * @SerializedName("app-settings")
     */
    protected $appSettings;

    /**
     * @Type("string")
     * @SerializedName("selected-record-id")
     */
    protected $selectedRecondId;

    /**
     * @Type("boolean")
     * @SerializedName("more-records")
     */
    protected $moreRecords;

    /**
     * @XmlList(inline=true, entry="record")
     * @Type("array<elevate\HVObjects\MethodObjects\PersonInfo\Record>")
     */
    protected $record;

    /**
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\HVGroups")
     */
    protected $groups;

    /**
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\Culture")
     * @SerializedName("preferred-culture")
     */
    protected $preferredCulture;

    /**
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\Culture")
     * @SerializedName("preferred-uiculture")
     */
    protected $preferredUiculture;

    /**
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\Location")
     */
    protected $location;

    /**
     * @Type("elevate\HVObjects\MethodObjects\PersonInfo\EffectiveRecordPermissionList")
     * @SerializedName("effective-record-permission-list")
     */
    protected $effectiveRecordPermissionList;

    function __construct(
        $personId,
        $name,
        $selectedRecondId,
        $moreRecords,
        array $record,
        Culture $preferredCulture,
        Culture $preferredUiculture,
        Location $location,
        $appSettings = NULL,
        HVGroups $groups = NULL,
        EffectiveRecordPermissionList $effectiveRecordPermissionList = NULL
    )
    {
        $this->appSettings = $appSettings;
        $this->effectiveRecordPermissionList = $effectiveRecordPermissionList;
        $this->groups = $groups;
        $this->location = $location;
        $this->moreRecords = $moreRecords;
        $this->name = $name;
        $this->personId = $personId;
        $this->preferredCulture = $preferredCulture;
        $this->preferredUiculture = $preferredUiculture;
        $this->record = $record;
        $this->selectedRecondId = $selectedRecondId;
    }

    /**
     * @param mixed $appSettings
     */
    public function setAppSettings($appSettings)
    {
        $this->appSettings = $appSettings;
    }

    /**
     * @return mixed
     */
    public function getAppSettings()
    {
        return $this->appSettings;
    }

    /**
     * @param mixed $effectiveRecordPermissionList
     */
    public function setEffectiveRecordPermissionList($effectiveRecordPermissionList)
    {
        $this->effectiveRecordPermissionList = $effectiveRecordPermissionList;
    }

    /**
     * @return mixed
     */
    public function getEffectiveRecordPermissionList()
    {
        return $this->effectiveRecordPermissionList;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $moreRecords
     */
    public function setMoreRecords($moreRecords)
    {
        $this->moreRecords = $moreRecords;
    }

    /**
     * @return mixed
     */
    public function getMoreRecords()
    {
        return $this->moreRecords;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $preferredCulture
     */
    public function setPreferredCulture($preferredCulture)
    {
        $this->preferredCulture = $preferredCulture;
    }

    /**
     * @return mixed
     */
    public function getPreferredCulture()
    {
        return $this->preferredCulture;
    }

    /**
     * @param mixed $preferredUiculture
     */
    public function setPreferredUiculture($preferredUiculture)
    {
        $this->preferredUiculture = $preferredUiculture;
    }

    /**
     * @return mixed
     */
    public function getPreferredUiculture()
    {
        return $this->preferredUiculture;
    }

    /**
     * @param mixed $record
     */
    public function setRecord($record)
    {
        $this->record = $record;
    }

    /**
     * @return mixed
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @param mixed $selectedRecondId
     */
    public function setSelectedRecondId($selectedRecondId)
    {
        $this->selectedRecondId = $selectedRecondId;
    }

    /**
     * @return mixed
     */
    public function getSelectedRecondId()
    {
        return $this->selectedRecondId;
    }


} 