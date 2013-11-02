## Adding HVObject Unit Tests
=============================

1. Extend the abstract class BaseObjectTest.

2. Write a public stati function called setUpBeforeClass.
    Setup must do the following
    - Set the static class variable `sampleXMLPath` to the path of the HVObject's sample XML
    - Set the static class variable `objectNamespace` to the test class's full namespace (including the class name)
    - Set the static class variable `testObject` to an instance of the class being tested.
    - Call the parent method setUp, after these have been set.

3. Create a sample XML file and place it in the appropriate directory. Follow the established structure where the directories are mirrored through the src, test, and sampleXML directories.

   If any of these are not set, a call to the parent setUp method will throw an exception. All of the unit tests for
   testing serialize and deserialize functions are built into the class BaseObjectTest and they will run automatically
   when the class is extended.

   Here is a sample setUpBeforeClass Method. It is quite simple, since the testObject dose not have any other objects netsted in it.

    public static function setUpBeforeClass()
       {
           CodableValue::$sampleXMLPath = __DIR__ . '/../SampleXML/Generic/CodableValue.xml';
           CodableValue$objectNamespace = 'elevate\HVObjects\Generic\CodableValue';
           $codedValue                  = new CodedValue('5', 'Value Test', array('Test Suite'), array('Version 4'));
           CodableValue::$testObject    = new CodableValue('Code', array($codedValue));
           parent::setUpBeforeClass();
       }

