<?php

namespace elevate\Serializer;

/**
 * User: ofields
 * Date: 11/12/13
 * Time: 4:34 PM
 * To change this template use File | Settings | File Templates.
 */

class XmlObjectDeserializationVisitor extends \JMS\Serializer\XmlDeserializationVisitor
{

    /**
     * Don't need to do anything here since the XML is already parsed into an object.
     * @param mixed $data
     * @return mixed|\SimpleXMLElement
     */
    public function prepare($data)
    {
        return $data;
    }
}