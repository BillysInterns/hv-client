<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects\PersonInfo;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use PhpCollection\Map;
use PhpCollection\Sequence;

use elevate\HVObjects\Generic\Date\DateTime;

/** @XmlRoot("record") */
class Record
{

    /**
     * @XmlValue
     * @Type("string")
     */
    protected $value;

    /**
     * @XmlAttribute
     * @Type("string")
     */
    protected $id;

    /**
     * @XmlAttribute
     * @Type("boolean")
     * @SerializedName("record-custodian")
     */
    protected $recordCustodian = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("rel-type")
     */
    protected $relType;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("rel-name")
     */
    protected $relName = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("auth-expires")
     */
    protected $authExpires = NULL;

    /**
     * @XmlAttribute
     * @Type("boolean")
     * @SerializedName("auth-expired")
     */
    protected $authExpired = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("display-name")
     */
    protected $displayName = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     */
    protected $state = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("date-created")
     */
    protected $dateCreated = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("max-size-bytes")
     */
    protected $maxSizeBytes = NULL;

    /**
     * @XmlAttribute
     * @Type("integer")
     * @SerializedName("size-bytes")
     */
    protected $sizeBytes = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("app-record-auth-action")
     */
    protected $appRecordAuthAction = NULL;

    /**
     * @XmlAttribute
     * @Type("boolean")
     * @SerializedName("auto-reconcile-documents")
     */
    protected $autoReconcileDocuments = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("app-specific-record-id")
     */
    protected $appSpecificRecordId = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("location-country")
     */
    protected $locationCountry = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("location-state-province")
     */
    protected $locationStateProvince = NULL;

    /**
     * @XmlAttribute
     * @Type("string")
     * @SerializedName("date-updated")
     */
    protected $dateUpdated;

    function __construct(
        $value,
        $id = null,
        $recordCustodian = NULL,
        $relType = NULL,
        $relName = NULL,
        $authExpires = NULL,
        $authExpired = NULL,
        $displayName = NULL,
        $state = NULL,
        $dateCreated = NULL,
        $maxSizeBytes = NULL,
        $sizeBytes = NULL,
        $appRecordAuthAction = NULL,
        $autoReconcileDocuments = NULL,
        $appSpecificRecordId = NULL,
        $locationCountry = NULL,
        $locationStateProvince = NULL,
        $dateUpdated  = NULL
    )
    {
        $this->value = $value;
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