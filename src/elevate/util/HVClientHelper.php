<?php
/**
 * User: ofields
 * Date: 11/8/13
 * Time: 11:26 AM
 */

namespace elevate\util;

use elevate\HVObjects\MethodObjects\Info;
use JMS\Serializer\SerializerBuilder;

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
        $result = $xml->xpath('//group');

//turn it to groups
        return $groups;
    }

}