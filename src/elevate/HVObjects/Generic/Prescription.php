<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 1:22 AM
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

/** @XmlRoot("prescription") */
class Prescription {

    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("prescribed-by")
     */
    protected $prescribedBy;

    /**
     * @Type("elevate\HVObjects\Generic\Date\ApproxDateTime")
     * @SerializedName("date-prescribed")
     */
    protected $datePrescribed;

    /**
     * @Type("elevate\HVObjects\Generic\GeneralMeasurement")
     * @SerializedName("amount-prescribed")
     */
    protected $amountPrescribed;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("substitution")
     */
    protected $substitution;


    /**
     * @Type("integer")
     * @SerializedName("refills")
     */
    protected $refills;


    /**
     * @Type("integer")
     * @SerializedName("days-supply")
     */
    protected $daysSupply;

    /**
     * @Type("elevate\HVObjects\Generic\Date\Date")
     * @SerializedName("prescription-expiration")
     */
    protected $prescriptionExpiration;

    /**
     * @Type("elevate\HVObjects\Generic\CodableValue")
     * @SerializedName("instructions")
     */
    protected $instructions;

    function __construct(
        $amountPrescribed,
        $datePrescribed,
        $daysSupply,
        $instructions,
        $prescribedBy,
        $prescriptionExpiration,
        $refills,
        $substitution
    )
    {
        $this->amountPrescribed = $amountPrescribed;
        $this->datePrescribed = $datePrescribed;
        $this->daysSupply = $daysSupply;
        $this->instructions = $instructions;
        $this->prescribedBy = $prescribedBy;
        $this->prescriptionExpiration = $prescriptionExpiration;
        $this->refills = $refills;
        $this->substitution = $substitution;
    }


} 