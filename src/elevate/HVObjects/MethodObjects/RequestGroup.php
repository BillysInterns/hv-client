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

    /**  @XmlAttribute */
    private $name = NULL;

    /**  @XmlAttribute */
    private $max = NULL;

    /**  @XmlAttribute */
    private $maxFull = NULL;

    /**
     * @var elevate\HVObjects\Generic\MethodObjects\ThingFilterSpec
     * @Type("elevate\HVObjects\Generic\MethodObjects\ThingFilterSpec")
     */
    protected $filter;

    /**
     * @var elevate\HVObjects\Generic\MethodObjects\ThingFormatSpec
     * @Type("elevate\HVObjects\Generic\MethodObjects\ThingFormatSpec")
     */
    protected $format;

    /**
     * @var bool
     * @Type("boolean")
     * @SerializedName("current-version-only")
     */
    protected $currentVersionOnly = TRUE;

    function __construct(
        ThingFilterSpec $filter,
        ThingFormatSpec $format,
        $max = NULL,
        $maxFull = NULL,
        $name = NULL,
        $currentVersionOnly = TRUE
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