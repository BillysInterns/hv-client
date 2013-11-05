<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/5/13
 * Time: 4:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Generic;


class Location extends AbstractXMLEntity
{

    /**
     * @Type("string")
     */
    protected $country;

    /**
     * @Type("string")
     * @SerializedName("state-province")
     */
    protected $stateProvince;

    function __construct($country, $stateProvince)
    {
        $this->country = $country;
        $this->stateProvince = $stateProvince;
    }


}