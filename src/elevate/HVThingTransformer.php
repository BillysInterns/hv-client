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
            foreach( $things as $thing )
            {
                $response[$name][] = $thing->getDataXML()->getType();
            }
        }
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($response, 'json');
    }


}