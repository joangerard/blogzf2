<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
        ),
        'display_exceptions' => true,
    ),
    'session' => array(
        'config' => array(
            'class' => 'Zend\\Session\\Config\\SessionConfig',
            'options' => array(
                'name' => 'blogapp',
            ),
        ),
        'storage' => 'Zend\\Session\\Storage\\SessionArrayStorage',
        'validators' => array(
            0 => 'Zend\\Session\\Validator\\RemoteAddr',
            1 => 'Zend\\Session\\Validator\\HttpUserAgent',
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'map' => array(
                'Status\\V1' => 'status',
            ),
        ),
    ),
);
