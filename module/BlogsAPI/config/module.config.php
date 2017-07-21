<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'BlogsAPI\\V1\\Rest\\Blog\\BlogResource' => 'BlogsAPI\\V1\\Rest\\Blog\\BlogResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'blogs-api.rest.blog' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/blogs[/:blog_id]',
                    'defaults' => array(
                        'controller' => 'BlogsAPI\\V1\\Rest\\Blog\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'blogs-api.rest.blog',
        ),
    ),
    'zf-rest' => array(
        'BlogsAPI\\V1\\Rest\\Blog\\Controller' => array(
            'listener' => 'BlogsAPI\\V1\\Rest\\Blog\\BlogResource',
            'route_name' => 'blogs-api.rest.blog',
            'route_identifier_name' => 'blog_id',
            'collection_name' => 'blog',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
                3 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
                3 => 'PATCH',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'BlogsAPI\\V1\\Rest\\Blog\\BlogEntity',
            'collection_class' => 'BlogsAPI\\V1\\Rest\\Blog\\BlogCollection',
            'service_name' => 'Blog',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'BlogsAPI\\V1\\Rest\\Blog\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'BlogsAPI\\V1\\Rest\\Blog\\Controller' => array(
                0 => 'application/vnd.blogs-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'BlogsAPI\\V1\\Rest\\Blog\\Controller' => array(
                0 => 'application/vnd.blogs-api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'BlogsAPI\\V1\\Rest\\Blog\\BlogEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'blogs-api.rest.blog',
                'route_identifier_name' => 'blog_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'BlogsAPI\\V1\\Rest\\Blog\\BlogCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'blogs-api.rest.blog',
                'route_identifier_name' => 'blog_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'BlogsAPI\\V1\\Rest\\Blog\\Controller' => array(
            'input_filter' => 'BlogsAPI\\V1\\Rest\\Blog\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'BlogsAPI\\V1\\Rest\\Blog\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'name',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'content',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'author',
            ),
        ),
    ),
);
