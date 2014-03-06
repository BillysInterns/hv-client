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
use elevate\HVObjects\Generic\Date\Date;
use Mentis\BaseBundle\Utils\HealthVault\HvInfoDeserializer;
use elevate\HVObjects\MethodObjects\PersonInfo\PersonInfo;

/**
 * Class HVClientHelper
 * @package elevate\util
 *
 * Utility class to help parse, create objects for HealthVault calls
 */
class HVClientHelper {

    /**
     * @param object $info
     * @return string
     */
    static function HVInfoAsXML($info)
    {
        $preBuiltserializer = SerializerBuilder::create();
        $preBuiltserializer->configureListeners(
            function(EventDispatcher $dispatcher)
            {
                $dispatcher->addSubscriber(new EventSubscriber());
            }
        );
        $serializer = $preBuiltserializer->build();
        $xml = $serializer->serialize($info, 'xml');
        return $xml;
    }

    /**
     * @param $rawResponse
     * Helper function to pre-deserialize and build
     * @return array
     */
    private static function HVDeserializeBuilder($rawResponse)
    {
        $xml = simplexml_load_string( $rawResponse );

        // Get the namespace for wc from the document and register for XPath
        // There are two values coming back based on version of GetThings used
        // Used for images -urn:com.microsoft.wc.methods.response.GetThings
        // Used for rest - urn:com.microsoft.wc.methods.response.GetThings3
        $namespace = $xml->getDocNamespaces(true);
        foreach($namespace as $key=>$value)
        {
            $xml->registerXPathNamespace($key, $value);
        }

        $serializer = SerializerBuilder::create();
        $serializer->configureListeners(
            function(EventDispatcher $dispatcher)
            {
                $dispatcher->addSubscriber(new EventSubscriber());
            }
        );
        $serializer->setDeserializationVisitor("xmlobject", new XmlObjectDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy())) );
        $serializerBuilder = $serializer->build();

        return array(
            'xml'               => $xml,
            'serializerBuilder' => $serializerBuilder
        );
    }

    /**
     * @param $rawResponse
     * Function that parses an HV response for Personinfo into a Personinfo object
     * @return null|PersonInfo
     */
    static function HVPersonFromXML ($rawResponse)
    {
        $info = HVClientHelper::HVDeserializeBuilder($rawResponse);

        $xmlObjects = $info['xml']->xpath('/response/wc:info/person-info');

        $response = NULL;
        foreach ($xmlObjects as $xmlObject)
        {
            $response = $info['serializerBuilder']->deserialize(
                $xmlObject, 'elevate\HVObjects\MethodObjects\PersonInfo\PersonInfo', 'xmlobject'
            );
        }

        return $response;
    }

    /**
     * @param $rawResponse
     * Function that parses an HV response for Things into an array of Thing objects
     * @return array
     */
    static function HVGroupsFromXML( $rawResponse )
    {
        $info = HVClientHelper::HVDeserializeBuilder($rawResponse);

        $groupXMLObjects = $info['xml']->xpath('/response/wc:info/group');
        $responseGroups = array();
//        $responseGroups = $serializerBuilder->deserialize($groupXMLObjects, 'array<elevate\\HVObjects\\MethodObjects\\ResponseGroup>', 'xmlobject');
        foreach ($groupXMLObjects as $group)
        {
            $responseGroups[] = $info['serializerBuilder']->deserialize($group, 'elevate\HVObjects\MethodObjects\ResponseGroup', 'xmlobject');
        }

        return $responseGroups;
    }

    /**
     * @param $xmlResponse
     *
     * @return array
     */
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