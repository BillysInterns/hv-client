<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bnissen
 * Date: 11/1/13
 * Time: 4:17 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\HVObjects\Generic;


/** @XmlRoot("email") */
class Email
{

    /**
     * @Type("string")
     */
    protected $description;

    /**
     * @Type("boolean")
     */
    protected $isPrimary;

    /**
     * @Type("string")
     */
    protected $address;

}