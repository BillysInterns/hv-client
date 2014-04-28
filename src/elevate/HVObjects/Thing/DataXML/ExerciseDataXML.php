<?php
/**
 * Created by PhpStorm.
 * User: ofields
 * Date: 4/25/14
 * Time: 11:43 AM
 */

namespace elevate\HVObjects\Thing\DataXML;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

use elevate\HVObjects\Generic\Common;
use elevate\HVObjects\Thing\DataXML\Type\ExerciseType;

/**
 * @AccessorOrder("custom", custom = {"exercise", "common"})
 */
class ExerciseDataXML extends DataXML
{

    /**
     * @Type("elevate\HVObjects\Thing\DataXML\Type\ExerciseType")
     * @SerializedName("exercise")
     */
    protected $exercise;

    function __construct(ExerciseType $exerciseType = NULL, Common $common = NULL)
    {
        $this->exercise = $exerciseType;
        parent::__construct($common);
    }

    /**
     * @param ExerciseType $exercise
     */
    public function setExercise(ExerciseType $exercise)
    {
        $this->exercise = $exercise;
    }

    /**
     * @return ExerciseType
     */
    public function getExercise()
    {
        return $this->exercise;
    }



} 