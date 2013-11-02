<?php
/**
 * @author arkzero
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