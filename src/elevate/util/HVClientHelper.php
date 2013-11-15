<?php
/**
 * User: ofields
 * Date: 11/8/13
 * Time: 11:26 AM
 */

namespace elevate\util;

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

/**
 * Class HVClientHelper
 * @package elevate\util
 *
 * Utility class to help parse, create objects for HealthVault calls
 */
class HVClientHelper {

    /**
     * @param Info $info
     * @return string
     */
    static function HVInfoAsXML(Info $info)
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = $serializer->serialize($info, 'xml');
        return $xml;
    }

    static function HVGroupsFromXML( $rawResponse )
    {
        $groups = array();
        $xml = simplexml_load_string( $rawResponse );
        $xml->registerXPathNamespace('wc', 'urn:com.microsoft.wc.methods.response.GetThings3');
        $groupXMLObjects = $xml->xpath('//group');

        $serializer = \JMS\Serializer\SerializerBuilder::create();
        $serializer->configureListeners(
            function(EventDispatcher $dispatcher)
            {
                $dispatcher->addSubscriber(new EventSubscriber());
            }
        );
        $serializer->setDeserializationVisitor("xmlobject", new XmlObjectDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy())) );
        $serializerBuilder = $serializer->build();

        $responseGroups = array();
//        $responseGroups = $serializerBuilder->deserialize($groupXMLObjects, 'array<elevate\\HVObjects\\MethodObjects\\ResponseGroup>', 'xmlobject');
        foreach ($groupXMLObjects as $group)
        {
            $responseGroups[] = $serializerBuilder->deserialize($group, 'elevate\HVObjects\MethodObjects\ResponseGroup', 'xmlobject');
        }

        return $responseGroups;
    }

}