<?php

namespace elevate;

use elevate\HVClient;
use elevate\HVObjects\MethodObjects\Get\Info;
use elevate\Serializer\XmlObjectDeserializationVisitor;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use elevate\util\EventSubscriber;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use elevate\TypeTranslator;
use JMS\Serializer\SerializerBuilder;
use elevate\HVObjects\MethodObjects\ResponseGroup;
use JMS\Serializer\SerializationContext;

class HVThingTransformer 
{
    public function encodeThing( $responseGroup )
    {
        foreach($responseGroup as $group )
        {
            $name = $group->getName();
            $things = $group->getThings();
            $translator = new TypeTranslator();
            $type = $translator->lookupTypeName($things[0]->getTypeId());

            foreach( $things as $thing )
            {
                $response[$name][] = $this->prepareType($type, $thing);
            }
        }
        return json_encode($response);
    }

    public function prepareType($type, $thing)
    {
        return $this->sectionDivision($type, $thing);
    }

    public function sectionDivision($type, $thing)
    {
        switch($type)
        {
            case 'Medication':
            case 'Medication #(v2)':
                return $this->prepareMedication($thing);

            case 'QuestionAnswer':
                return $this->prepareQA($thing);

            case 'Allergy':
                return $this->prepareAllergy($thing);

            case 'Condition';
                return $this->prepareCondition($thing);

        }
    }

    public function prepareMedication($thing)
    {
        $thingType =$thing->getDataXML()->getType();

        $medication['name'] = $thingType->getName()->getText();

        //ToDo add rest of variables needed

        return $medication;

    }

    public function prepareQA($thing)
    {
        $thingType =$thing->getDataXML()->getType();

        $qa['question'] = $thingType->getQuestion()->getText();

        foreach( $thingType->getAnswers() as $answer)
        {
            $qa['answer'][] = $answer->getText();
        }
        //ToDo add rest of variables needed

        return $qa;
    }

    public function prepareAllergy($thing)
    {
        $thingType =$thing->getDataXML()->getType();

        $allergy['name'] = $thingType->getName()->getText();

        //ToDo add rest of variables needed

        return $allergy;

    }

    public function prepareCondition($thing)
    {
        $thingType =$thing->getDataXML()->getType();

        $condition['name'] = $thingType->getName()->getText();
        $condition['status'] = $thingType->getStatus()->getText();

        //ToDo add rest of variables needed

        return $condition;


    }
}