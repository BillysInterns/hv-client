<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 11/4/13
 * Time: 1:17 AM
 */

namespace elevate\HVObjects\Generic\Date;


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

use elevate\HVObjects\Generic\Date\StructuredApproxDate;

/** @XmlRoot("approx-date-time") */
class ApproxDateTime
{

    /**
     * @Type("elevate\HVObjects\Generic\Date\StructuredApproxDate")
     * @SerializedName("structured")
     */
    protected $structured;

    /**
     * @Type("string")
     * @SerializedName("descriptive")
     */
    protected $descriptive;

    /**
     * @param $structured
     * @param $descriptive
     */
    public function __construct(StructuredApproxDate $structured = NULL, $descriptive = NULL )
    {
        $this->structured = $structured;
        $this->descriptive = $descriptive;
    }

    /**
     * @param mixed $descriptive
     */
    public function setDescriptive($descriptive)
    {
        $this->descriptive = $descriptive;
    }

    /**
     * @return mixed
     */
    public function getDescriptive()
    {
        return $this->descriptive;
    }

    /**
     * @param mixed $structured
     */
    public function setStructured($structured)
    {
        $this->structured = $structured;
    }

    /**
     * @return mixed
     */
    public function getStructured()
    {
        return $this->structured;
    }



} 