<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:36 PM
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

class Culture extends AbstractXMLEntity
{
    /**
     * @Type("string")
     */
    protected $language;

    /**
     * @Type("string")
     */
    protected $country;

    function __construct($language, $country)
    {
        $this->country = $country;
        $this->language = $language;
    }
}