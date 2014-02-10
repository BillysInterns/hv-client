<?php
/**
 * User: ofields
 * Date: 11/8/13
 * Time: 11:26 AM
 */

namespace elevate\util;

use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Time;
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
use Symfony\Component\Validator\Constraints\Date;

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
    static function HVInfoAsXML($info)
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

    static function parsePutThingsResponse($xmlResponse)
    {
        $xml = simplexml_load_string( $xmlResponse );
        $xml->registerXPathNamespace('wc', 'urn:com.microsoft.wc.methods.response.PutThings2');
        $thingIds = $xml->xpath('//thing-id');

        $serializer = \JMS\Serializer\SerializerBuilder::create();
        $serializer->configureListeners(
            function(EventDispatcher $dispatcher)
            {
                $dispatcher->addSubscriber(new EventSubscriber());
            }
        );
        $serializer->setDeserializationVisitor("xmlobject", new XmlObjectDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy())) );
        $serializerBuilder = $serializer->build();

        foreach ($thingIds as $thing)
        {
            $response[] = $serializerBuilder->deserialize($thing, 'elevate\HVObjects\Generic\ThingId', 'xmlobject');
        }

        return $response;
    }

    /**
     * Takes PHP DateTime object and converts to Healthvault DateTime object
     * @param $dt
     *
     * @return DateTime
     */
    public static function convertPhpDateTimeToHvDateTime( $dt )
    {
        $date = new DateTime(
            self::convertPhpDateTimeToHvDate($dt),
            self::convertPhpDateTimeToHvTime($dt),
            new CodableValue(
                $dt->getTimezone()->getName()
            )
        );
        return $date;
    }

    /**
     * Takes PHP DateTime object and converts to Healthvault Date object
     * @param $dt
     *
     * @return Date
     */
    public static function convertPhpDateTimeToHvDate( $dt )
    {
        return new Date(
            $dt->format('Y'),
            $dt->format('m'),
            $dt->format('d')
        );
    }

    /**
     * Takes PHP DateTime object and converts to HealthVault Time object
     * @param $dt
     *
     * @return DateTime
     */
    public static function convertPhpDateTimeToHvTime(\DateTime $dt )
    {
        return new Time(
            $dt->format('H'),
            $dt->format('i'),
            $dt->format('s'),
            $dt->format('u')
        );
    }

}