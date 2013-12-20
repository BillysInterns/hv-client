<?php

// Bootstrap the JMS custom annotations for Object to JSON mapping
$pathPrefix = "vendor";
if ( !file_exists("vendor/autoload.php"))
{
    $pathPrefix = "../..";
}

require_once($pathPrefix . '/autoload.php');

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    $pathPrefix . '/jms/serializer/src'
);


