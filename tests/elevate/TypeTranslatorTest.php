<?php

/**
 * @author troussos
 */


namespace elevate\test;

use elevate\TypeTranslator;

class TypeTranslatorTest extends BaseTest
{

    /**
     * Test the lookup Type ID Method
     *
     * @covers elevate\TypeTranslator::lookupTypeID
     */
    public function testlookupTypeID()
    {
        //Check that we recieve FALSE for an empty entry or an invalid one
        $this->assertFalse(TypeTranslator::lookupTypeID(''));
        $this->assertFalse(TypeTranslator::lookupTypeID('Not a Thing Type'));

        //Verify some valid thing ids
        $this->assertEquals('415c95e0-0533-4d9c-ac73-91dc5031186c', TypeTranslator::lookupTypeID('Care Plan'));
        $this->assertEquals('ef9cf8d5-6c0b-4292-997f-4047240bc7be', TypeTranslator::lookupTypeID('Device'));
        $this->assertEquals('85a21ddb-db20-4c65-8d30-33c899ccf612', TypeTranslator::lookupTypeID('Exercise'));
        $this->assertEquals('5c5f1223-f63c-4464-870c-3e36ba471def', TypeTranslator::lookupTypeID('Medication'));
        $this->assertEquals('11c52484-7f1a-11db-aeac-87d355d89593', TypeTranslator::lookupTypeID('Sleep Session'));
    }

    /**
     * Test the lookup type name method
     *
     * @covers elevate\TypeTranslator::lookupTypeName
     */
    public function testlookupTypeName()
    {

        //Verify that an empty of invalid lookup returns FALSE
        $this->assertFalse(TypeTranslator::lookupTypeName(''));
        $this->assertFalse(TypeTranslator::lookupTypeName('Not an ID'));

        //Verify that a valid id will return a stripped version
        $this->assertEquals(
            'EmotionalState', TypeTranslator::lookupTypeName('4b7971d6-e427-427d-bf2c-2fbcf76606b3')
        );

        $this->assertEquals(
            'FamilyHistory3', TypeTranslator::lookupTypeName('4a04fcc8-19c1-4d59-a8c7-2031a03f21de')
        );

        $this->assertEquals(
            'Medication2', TypeTranslator::lookupTypeName('30cafccc-047d-4288-94ef-643571f7919d')
        );

        //Verify that a valid id with a second parameter of true will return a stripped version
        $this->assertEquals(
            'EmotionalState', TypeTranslator::lookupTypeName('4b7971d6-e427-427d-bf2c-2fbcf76606b3', TRUE)
        );

        $this->assertEquals(
            'FamilyHistory3', TypeTranslator::lookupTypeName('4a04fcc8-19c1-4d59-a8c7-2031a03f21de', TRUE)
        );

        $this->assertEquals(
            'Medication2', TypeTranslator::lookupTypeName('30cafccc-047d-4288-94ef-643571f7919d', TRUE)
        );

        //Verify that a nonstripped version of the thing name can be gotten
        $this->assertEquals(
            'Emotional State', TypeTranslator::lookupTypeName('4b7971d6-e427-427d-bf2c-2fbcf76606b3', FALSE)
        );

        $this->assertEquals(
            'Family History #(v3)', TypeTranslator::lookupTypeName('4a04fcc8-19c1-4d59-a8c7-2031a03f21de', FALSE)
        );

        $this->assertEquals(
            'Medication #(v2)', TypeTranslator::lookupTypeName('30cafccc-047d-4288-94ef-643571f7919d', FALSE)
        );

    }
}
 