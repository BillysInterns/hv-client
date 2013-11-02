<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 3:47 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Thing;


class Allergy extends Thing
{

    /**
     * @var array elevate\HVObjects\Thing\DataXML\Allergy
     * @Type("elevate\HVObjects\Thing\DataXML\Allergy")
     * @serializedName("data-xml")
     */
    protected $dataXML;

}