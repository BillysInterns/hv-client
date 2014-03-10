<?php

/** @author jonfor */

namespace elevate\HVObjects\Thing\DataXML\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlRoot;

use elevate\HVObjects\Generic\Contact;

/** @XmlRoot("contact") */
class PersonalContactInformationType
{
    /**
     * @Type("elevate\HVObjects\Generic\Contact")
     * @SerializedName("contact")
     */
    protected $contact;

    function __construct(Contact $contact = NULL)
    {
        $this->contact = $contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }


}