<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects;

abstract class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected static $serializer;
    protected static $sampleXMLPath = null;
    protected static $xmlString;
    protected static $testObject = null;
    protected static $objectNamespace = null;

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlFile(
            self::$sampleXMLPath,
            self::$xmlString
        );
    }

    public function testDeserialize()
    {
        $object = self::$serializer->deserialize(
            self::$xmlString, self::$objectNamespace, 'xml'
        );

        $this->assertEquals(self::$testObject, $object);
    }


    /**
     * @covers self::__construct
     * @throws HVUnitTestBaseParameterNotDefinedException
     */
    public static function setUpBeforeClass()
    {
        if(is_null(self::$sampleXMLPath) || is_null(self::$testObject) || is_null(self::$objectNamespace))
        {
            throw new HVUnitTestBaseParameterNotDefinedException();
        }

        self::$serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        self::$xmlString  = self::$serializer->serialize(self::$testObject, 'xml');
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