<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use elevate\util\EventSubscriber;

abstract class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected static $serializer;
    protected static $sampleXMLPath = null;
    protected static $xmlString = null;
    protected static $testObject = null;
    protected static $objectNamespace = null;
    protected static $serializerBuilder;

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlFile(
            self::$sampleXMLPath,
            self::$xmlString
        );
    }

    public function testDeserialize()
    {

        $deserializedObject = self::$serializerBuilder->deserialize(
            self::$xmlString, self::$objectNamespace, 'xml'
        );

        $this->assertEquals(self::$testObject, $deserializedObject);
    }


    /**
     * @covers self::__construct
     * @throws HVUnitTestBaseParameterNotDefinedException
     */
    public static function setUpBeforeClass()
    {
        if(empty(self::$sampleXMLPath) || empty(self::$testObject))
        {
            throw new HVUnitTestBaseParameterNotDefinedException();
        }

        self::$objectNamespace = get_class(self::$testObject);

        self::$serializer = \JMS\Serializer\SerializerBuilder::create();
        self::$serializer->configureListeners(
            function(EventDispatcher $dispatcher)
            {
                $dispatcher->addSubscriber(new EventSubscriber());
            }
        );
        self::$serializerBuilder = self::$serializer->build();
        self::$xmlString  = self::$serializerBuilder->serialize(self::$testObject, 'xml');

    }

    public static function tearDownAfterClass()
    {
        self::$testObject = null;
        self::$sampleXMLPath = null;
        self::$objectNamespace = null;
    }
}

class HVUnitTestException extends \Exception
{

}

class HVUnitTestBaseParameterNotDefinedException extends HVUnitTestException
{

}