<?php

    require_once('vendor/autoload.php');

// Bootstrap the JMS custom annotations for Object to Json mapping
    \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'JMS\Serializer\Annotation',
        'vendor/jms/serializer/src'
    );