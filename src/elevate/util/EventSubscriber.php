<?php

namespace elevate\util;

use elevate\TypeTranslator;

class EventSubscriber implements \JMS\Serializer\EventDispatcher\EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            array('event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize'),
            array('event' => 'serializer.post_deserialize', 'method' => 'onPostSerialize')
        );
    }

    /**
     * @param \JMS\Serializer\EventDispatcher\PreDeserializeEvent $event
     */
    public function onPreDeserialize(
        \JMS\Serializer\EventDispatcher\PreDeserializeEvent $event
    )
    {
        $type = $event->getType();
        if ($type['name'] === 'elevate\HVObjects\Thing\Thing')
        {
            $data         = $event->getData();
            $typeId       = ((string) $data->{'type-id'});
            $templateName = TypeTranslator::lookupTypeName($typeId);
            $event->setType('elevate\\HVObjects\\Thing\\' . $templateName);
        }
        if ($type['name'] === 'elevate\HVObjects\Generic\Extension')
        {
            $event->setType('elevate\\HVObjects\\Generic\\Recurrent');
        }
    }

    /**
     * @param \JMS\Serializer\EventDispatcher\ObjectEvent $event
     */
    public function onPostSerialize(
        \JMS\Serializer\EventDispatcher\ObjectEvent $event
    )
    {
        //Check the Extension XML and switch the array keys for the Extension Type
        $type = $event->getType();
        if ($type['name'] === 'elevate\HVObjects\Generic\Common')
        {
            $object                 = $event->getObject();
            $extension              = $object->getExtension();
            $extension['recurrent'] = !empty($extension[0]) ? $extension[0] : "";
            unset($extension[0]);
            $object->setExtension($extension);
        }
    }
}