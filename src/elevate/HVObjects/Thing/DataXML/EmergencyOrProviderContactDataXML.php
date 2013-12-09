<?php
/** @author troussos **/

namespace elevate\HVObjects\Thing\DataXML;

use elevate\HVObjects\Generic\Person;
use elevate\HVObjects\Generic\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

class EmergencyOrProviderContactDataXML extends DataXML
{
    /**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("person")
     */
    protected $person;

    public function __construct(Person $person = NULL, Common $common = NULL)
    {
        $this->person = $person;
        parent::__construct($common);
    }

    /**
     * @param mixed $person
     * @return $this
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }


}