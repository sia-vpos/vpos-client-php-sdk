<?php


/**
 * Class XMLParser
 *
 * Utility class performing static marshalling and unmarshalling of XML docs
 *
 * @author Gabriel Raul Marini
 */
class XMLParser
{
    /**
     * Convert XML string into generic object
     *
     * @param string $xml string to be converted into generic object
     * @return SimpleXMLElement representation of the XML input string
     */
    public static function parseString(string $xml)
    {
        return new SimpleXMLElement($xml);
    }

    /**
     * Convert a generic object into the corresponding XML string representation
     *
     * @param object $object to convert in XML string
     * @return mixed XML string representation of the input object
     */
    public static function getXML(object $object)
    {
        return $object->toXML();
    }

}