<?php

    require_once('/var/www/mentis-web/vendor/autoload.php');

// Bootstrap the JMS custom annotations for Object to Json mapping
    \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'JMS\Serializer\Annotation',
        '/var/www/mentis-web/vendor/jms/serializer/src'
    );
