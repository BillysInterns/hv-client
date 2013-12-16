<?php

namespace elevate\util;
use elevate\TypeTranslator;

class EventSubscriber implements \JMS\Serializer\EventDispatcher\EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            array('event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize'),
        );
    }

    public function onPreDeserialize(\JMS\Serializer\EventDispatcher\PreDeserializeEvent $event)
    {
        $type = $event->getType();
        if($type['name'] === 'elevate\HVObjects\Thing\Thing')
        {
            $data = $event->getData();
            $typeId = ((string) $data->{'type-id'});
            $templateName = TypeTranslator::lookupTypeName($typeId);
            $event->setType('elevate\\HVObjects\\Thing\\' . $templateName );
        }
        if($type['name'] == 'elevate\HVObjects\Generic\CustomExtension')
        {
            $event->setType('elevate\\HVObjects\\Generic\\Recurrent');
        }
    }
}