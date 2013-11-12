<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ofields
 * Date: 11/12/13
 * Time: 4:40 PM
 * To change this template use File | Settings | File Templates.
 */

namespace elevate\test\Serializer;


use elevate\Serializer\XmlObjectDeserializationVisitor;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;

class XmlObjectDeserializationVisitorTest extends \PHPUnit_Framework_TestCase {


    public function testDeserializeXMLObjects()
    {
        $xmlObj = simplexml_load_file(__DIR__ . '/../HVObjects/SampleXML/Thing/Allergy.xml');

        $serializer = \JMS\Serializer\SerializerBuilder::create();
        $serializer->setDeserializationVisitor("xmlobject", new XmlObjectDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy())) );

        $serializerBuilder = $serializer->build();
        $object = $serializerBuilder->deserialize($xmlObj, 'elevate\HVObjects\Thing\Allergy', 'xmlobject');
        $this->assertNotNull($object);
    }
}