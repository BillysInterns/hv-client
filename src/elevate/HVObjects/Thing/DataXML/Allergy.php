<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 3:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing\DataXML;


class Allergy extends DataXML{

    /**
     * @Type("elevate\HVObjects\Thing\Type\Allergy")
     * @SerializedName("allergy")
     */
    protected $allergy;

}