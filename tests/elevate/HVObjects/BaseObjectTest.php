<?php

/**
 * @author troussos
 */

namespace elevate\test\HVObjects;

abstract class BaseObjectTest extends \PHPUnit_Framework_TestCase
{
    protected static $serializer;
    protected static $sampleXMLPath;
    protected static $xmlString;
    protected static $testObject;
    protected static $objectNamespace;

    public function testSerialize()
    {
        $this->assertXmlStringEqualsXmlFile(
            BaseObjectTest::$sampleXMLPath,
            BaseObjectTest::$xmlString
        );
    }

    public function testDeserialize()
    {
        $object = BaseObjectTest::$serializer->deserialize(
            BaseObjectTest::$xmlString, BaseObjectTest::$objectNamespace, 'xml'
        );

        $this->assertEquals(BaseObjectTest::$testObject, $object);
    }

    public static function setUpBeforeClass()
    {
        if(!isset(BaseObjectTest::$sampleXMLPath) || !isset(BaseObjectTest::$testObject) || !isset(BaseObjectTest::$objectNamespace))
        {
            throw new HVUnitTestBaseParameterNotDefinedException();
        }

        BaseObjectTest::$serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        BaseObjectTest::$xmlString  = BaseObjectTest::$serializer->serialize(BaseObjectTest::$testObject, 'xml');
    }
}

class HVUnitTestException extends \Exception
{

}

class HVUnitTestBaseParameterNotDefinedException extends HVUnitTestException
{

}