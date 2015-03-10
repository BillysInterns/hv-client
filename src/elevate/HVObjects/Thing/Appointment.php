<?php

/**
 * @author Sumit
 */

namespace elevate\HVObjects\Thing;

use JMS\Serializer\Annotation\XmlRoot;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;

use elevate\TypeTranslator;
use elevate\HVObjects\Thing\Thing;
use elevate\HVObjects\Thing\DataXML\AppointmentDataXML;

/** @XmlRoot("thing") */
class Appointment extends Thing
{

	/**
	* @Type("elevate\HVObjects\Thing\DataXML\AppointmentDataXML")
	* @SerializedName("data-xml")
	*/
	protected $dataXML;

	function __construct($dataXML = NULL)
    {
        $typeID = TypeTranslator::lookupTypeID('Appointment');
        parent::__construct($dataXML,$typeID);
    }

}