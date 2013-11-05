<?php

/**
 * @author troussos
 */

namespace elevate\HVObjects;

use elevate\HVObjects\Generic\AppSettings;
use elevate\HVObjects\Generic\EffectiveRecordPermissionList;
use elevate\HVObjects\Generic\Location;
use elevate\HVObjects\Generic\Record;
use elevate\HVObjects\Generic\HVGroups;
use elevate\HVObjects\Generic\Culture;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;


class PersonInfo extends AbstractXMLEntity
{

    /**
     * @Type("string")
     * @SerializedName("person-id")
     */
    protected $personId;

    /**
     * @Type("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\AppSettings")
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
     * @Type("elevate\HVObjects\Generic\Record")
     */
    protected $record;

    /**
     * @Type("elevate\HVObjects\Generic\Groups")
     */
    protected $groups;

    /**
     * @Type("elevate\HVObjects\Generic\Culture")
     * @SerializedName("preferred-culture")
     */
    protected $preferredCulture;

    /**
     * @Type("elevate\HVObjects\Generic\Culture")
     * @SerializedName("preferred-uiculture")
     */
    protected $preferredUiculture;

    /**
     * @Type("elevate\HVObjects\Generic\Location")
     */
    protected $location;

    /**
     * @Type("elevate\HVObjects\Generic\EffectiveRecordPermissionList")
     * @SerializedName("effective-record-permission-list")
     */
    protected $effectiveRecordPermissionList;

    function __construct(
        $personId,
        $name,
        AppSettings $appSettings,
        $selectedRecondId,
        $moreRecords,
        Record $record,
        HVGroups $groups,
        Culture $preferredCulture,
        Culture $preferredUiculture,
        Location $location,
        EffectiveRecordPermissionList $effectiveRecordPermissionList
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


} 