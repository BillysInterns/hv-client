<?php

namespace elevate\HVObjects\Thing\DataXML\Type;



/** @XmlRoot("appointment") */
class AppointmentType
{
	protected $when;

	protected $duration;

	/*
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("service")
	*/
	protected $service;

	/**
     * @Type("elevate\HVObjects\Generic\Person")
     * @SerializedName("clinic")
     */
	protected $clinic;

	/*
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("specialty")
	*/
	protected $specialty;

	/*
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("status")
	*/
	protected $status;

	/*
	* @Type("elevate\HVObjects\Generic\CodableValue")
	* @SerializedName("care-class")
	*/
	protected $careClass
}