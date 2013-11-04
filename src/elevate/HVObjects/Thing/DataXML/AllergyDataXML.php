<?php

/**
 * @author arkzero
 */
namespace elevate\HVObjects\Thing\DataXML;


class AllergyDataXML extends DataXML{

    /**
     * @Type("elevate\HVObjects\Thing\Type\AllergyType")
     * @SerializedName("allergy")
     */
    protected $allergy;

}