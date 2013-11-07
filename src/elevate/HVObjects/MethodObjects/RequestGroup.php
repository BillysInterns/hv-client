<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/6/13
 * Time: 3:07 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\MethodObjects;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Groups;

/** @XmlRoot("group") */
class RequestGroup
{

    /**
     * @XmlAttribute
     * @Type("string")
     */
    private $name = NULL;

    /**
     * @XmlAttribute
     * @Type("integer")
     */
    private $max = NULL;

    /**
     * @XmlAttribute
     * @Type("integer")
     */
    private $maxFull = NULL;

    /**
     * @var elevate\HVObjects\MethodObjects\ThingFilterSpec
     * @Type("elevate\HVObjects\MethodObjects\ThingFilterSpec")
     */
    protected $filter;

    /**
     * @var elevate\HVObjects\MethodObjects\ThingFormatSpec
     * @Type("elevate\HVObjects\MethodObjects\ThingFormatSpec")
     */
    protected $format;

    /**
     * @var bool
     * @Type("boolean")
     * @SerializedName("current-version-only")
     */
    protected $currentVersionOnly = NULL;

    function __construct(
        ThingFilterSpec $filter,
        ThingFormatSpec $format,
        $max = NULL,
        $maxFull = NULL,
        $name = NULL,
        $currentVersionOnly = NULL
    )
    {
        $this->currentVersionOnly = $currentVersionOnly;
        $this->filter = $filter;
        $this->format = $format;
        $this->max = $max;
        $this->maxFull = $maxFull;
        $this->name = $name;
    }


}