<?php

/**
 * @author arkzero
 */

namespace elevate\HVObjects\Thing;


class Allergy extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\AllergyDataXML
     * @Type("elevate\HVObjects\Thing\DataXML\Allergy")
     * @serializedName("data-xml")
     */
    protected $dataXML;

}