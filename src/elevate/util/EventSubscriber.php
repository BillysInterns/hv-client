<?php

namespace elevate\util;

use elevate\TypeTranslator;

class EventSubscriber implements \JMS\Serializer\EventDispatcher\EventSubscriberInterface
{
    // Save reference to the Thing we're currently parsing
    private $hvTemplateName = null;


    public static function getSubscribedEvents()
    {
        return array(
            array('event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize'),
            array('event' => 'serializer.pre_serialize', 'method' => 'onPreSerialize')
        );
    }

    /**
     * @param \JMS\Serializer\EventDispatcher\PreDeserializeEvent $event
     */
    public function onPreDeserialize(\JMS\Serializer\EventDispatcher\PreDeserializeEvent $event )
    {
        $type = $event->getType();
        $name = $type['name'];

        if ($name === 'elevate\HVObjects\Thing\Thing')
        {
            $data         = $event->getData();
            $typeId       = ((string) $data->{'type-id'});
            $templateName = TypeTranslator::lookupTypeName($typeId);
            $event->setType('elevate\\HVObjects\\Thing\\' . $templateName);
            $this->hvTemplateName = $templateName;
        }
//        else if ($name === 'elevate\HVObjects\Generic\Extension')
//        {
//            if ( $this->hvTemplateName == "Appointment")
//            {
//                $event->setType('elevate\\HVObjects\\Generic\\' . $this->hvTemplateName . 'Extension');
//            }
//        }
    }

    /**
     * @param \JMS\Serializer\EventDispatcher\PreSerializeEvent $event
     */
    public function onPreSerialize(\JMS\Serializer\EventDispatcher\PreSerializeEvent $event )
    {
        $type = $event->getType();
        $name = $type['name'];

        if ($name === 'elevate\HVObjects\Thing\Thing')
        {
            $data         = $event->getData();
            $typeId       = ((string) $data->{'type-id'});
            $templateName = TypeTranslator::lookupTypeName($typeId);
            $event->setType('elevate\\HVObjects\\Thing\\' . $templateName);
            $this->hvTemplateName = $templateName;
        }
//        else if ($name === 'elevate\HVObjects\Generic\Extension')
//        {
//            if ( $this->hvTemplateName == "Appointment")
//            {
//                $event->setType('elevate\\HVObjects\\Generic\\' . $this->hvTemplateName . 'Extension');
//            }
//        }
    }

}