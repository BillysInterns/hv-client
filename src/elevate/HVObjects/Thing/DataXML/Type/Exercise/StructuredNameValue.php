<?php

namespace elevate\HVObjects\Thing\DataXML\Type\Exercise;

use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\StructuredMeasurement;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class StructuredNameValue {

    /**
     * @Type("elevate\HVObjects\Generic\CodedValue")
     * @SerializedName("name")
     */
    protected $name;

    /**
     * @Type("elevate\HVObjects\Generic\StructuredMeasurement")
     * @SerializedName("value")
     */
    protected $value;

    /**
     * @param CodedValue $name
     * @param StructuredMeasurement $value
     */
    public function __construct(CodedValue $name, StructuredMeasurement $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @param CodedValue $name
     */
    public function setName(CodedValue $name)
    {
        $this->name = $name;
    }

    /**
     * @return CodedValue
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param StructuredMeasurement $value
     */
    public function setValue(StructuredMeasurement $value)
    {
        $this->value = $value;
    }

    /**
     * @return StructuredMeasurement
     */
    public function getValue()
    {
        return $this->value;
    }

} 