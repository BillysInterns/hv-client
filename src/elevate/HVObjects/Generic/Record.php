<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:35 PM
 * To change this template use File | Settings | File Templates.
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

use elevate\HVObjects\Generic\Date\DateTime;


class Record extends AbstractXMLEntity
{
    /**
     * @Type("string")
     */
    protected $id;

    /**
     * @Type("boolean")
     * @SerializedName("record-custodian")
     */
    protected $recordCustodian = NULL;

    /**
     * @Type("integer")
     * @SerializedName("rel-type")
     */
    protected $relType;

    /**
     * @Type("string")
     * @SerializedName("rel-name")
     */
    protected $relName = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("auth-expires")
     */
    protected $authExpires = NULL;

    /**
     * @Type("boolean")
     * @SerializedName("auth-expired")
     */
    protected $authExpired = NULL;

    /**
     * @Type("string")
     * @SerizliedName("display-name")
     */
    protected $displayName = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\RecordState")
     */
    protected $state = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("date-created")
     */
    protected $dateCreated = NULL;

    /**
     * @Type("integer")
     * @SerializedName("max-size-bytes")
     */
    protected $maxSizeBytes = NULL;

    /**
     * @Type("integer")
     * @SerializedName("size-bytes")
     */
    protected $sizeBytes = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\AppRecordAuthAction")
     * @SerializedName("app-record-auth-action")
     */
    protected $appRecordAuthAction = NULL;

    /**
     * @Type("boolean")
     * @SerializedName("auto-reconcile-documents")
     */
    protected $autoReconcileDocuments = NULL;

    /**
     * @Type("string")
     * @SerializedName("app-specific-record-id")
     */
    protected $appSpecificRecordId = NULL;

    /**
     * @Type("string")
     * @SerializedName("location-country")
     */
    protected $locationCountry = NULL;

    /**
     * @Type("string")
     * @SerializedName("location-state-province")
     */
    protected $locationStateProvince = NULL;

    /**
     * @Type("elevate\HVObjects\Generic\Date\DateTime")
     * @SerializedName("date-updated")
     */
    protected $dateUpdated;

    function __construct(
        $id,
        $recordCustodian,
        $relType,
        $relName,
        DateTime $authExpires,
        $authExpired,
        $displayName,
        RecordState $state,
        DateTime $dateCreated,
        $maxSizeBytes,
        $sizeBytes,
        AppRecordAuthAction $appRecordAuthAction,
        $autoReconcileDocuments,
        $appSpecificRecordId,
        $locationCountry,
        $locationStateProvince,
        DateTime $dateUpdated
    )
    {
        $this->appRecordAuthAction = $appRecordAuthAction;
        $this->appSpecificRecordId = $appSpecificRecordId;
        $this->authExpired = $authExpired;
        $this->authExpires = $authExpires;
        $this->autoReconcileDocuments = $autoReconcileDocuments;
        $this->dateCreated = $dateCreated;
        $this->dateUpdated = $dateUpdated;
        $this->displayName = $displayName;
        $this->id = $id;
        $this->locationCountry = $locationCountry;
        $this->locationStateProvince = $locationStateProvince;
        $this->maxSizeBytes = $maxSizeBytes;
        $this->recordCustodian = $recordCustodian;
        $this->relType = $relType;
        $this->sizeBytes = $sizeBytes;
        $this->state = $state;
        $this->relName = $relName;
    }


}