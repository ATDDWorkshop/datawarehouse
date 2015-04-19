<?php
return array(
    'router' => array(
        'routes' => array(
            'datawarehouse.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'datawarehouse\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'datawarehouse.rest.package' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/package[/:package_id]',
                    'defaults' => array(
                        'controller' => 'datawarehouse\\V1\\Rest\\Package\\Controller',
                    ),
                ),
            ),
            'datawarehouse.rpc.marketing' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/marketing',
                    'defaults' => array(
                        'controller' => 'datawarehouse\\V1\\Rpc\\Marketing\\Controller',
                        'action' => 'marketing',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'datawarehouse.rest.user',
            1 => 'datawarehouse.rest.package',
            2 => 'datawarehouse.rpc.marketing',
        ),
    ),
    'zf-rest' => array(
        'datawarehouse\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'datawarehouse\\V1\\Rest\\User\\UserResource',
            'route_name' => 'datawarehouse.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'name',
                1 => 'password',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'datawarehouse\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'datawarehouse\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
        'datawarehouse\\V1\\Rest\\Package\\Controller' => array(
            'listener' => 'datawarehouse\\V1\\Rest\\Package\\PackageResource',
            'route_name' => 'datawarehouse.rest.package',
            'route_identifier_name' => 'package_id',
            'collection_name' => 'package',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'datawarehouse\\V1\\Rest\\Package\\PackageEntity',
            'collection_class' => 'datawarehouse\\V1\\Rest\\Package\\PackageCollection',
            'service_name' => 'Package',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'datawarehouse\\V1\\Rest\\User\\Controller' => 'HalJson',
            'datawarehouse\\V1\\Rest\\Package\\Controller' => 'HalJson',
            'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'datawarehouse\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'datawarehouse\\V1\\Rest\\Package\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'datawarehouse\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/json',
            ),
            'datawarehouse\\V1\\Rest\\Package\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/json',
            ),
            'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => array(
                0 => 'application/vnd.datawarehouse.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'datawarehouse\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'datawarehouse.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'datawarehouse\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'datawarehouse.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
            'datawarehouse\\V1\\Rest\\Package\\PackageEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'datawarehouse.rest.package',
                'route_identifier_name' => 'package_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'datawarehouse\\V1\\Rest\\Package\\PackageCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'datawarehouse.rest.package',
                'route_identifier_name' => 'package_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'datawarehouse\\V1\\Rest\\User\\UserResource' => array(
                'adapter_name' => 'ATDD',
                'table_name' => 'User',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'datawarehouse\\V1\\Rest\\User\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'datawarehouse\\V1\\Rest\\User\\UserResource\\Table',
                'resource_class' => 'datawarehouse\\V1\\Rest\\User\\UserResource',
            ),
            'datawarehouse\\V1\\Rest\\Package\\PackageResource' => array(
                'adapter_name' => 'ATDD',
                'table_name' => 'Package',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'datawarehouse\\V1\\Rest\\Package\\Controller',
                'entity_identifier_name' => 'id',
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(),
    ),
    'controllers' => array(
        'factories' => array(
            'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => 'datawarehouse\\V1\\Rpc\\Marketing\\MarketingControllerFactory',
        ),
    ),
    'zf-rpc' => array(
        'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => array(
            'service_name' => 'marketing',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'datawarehouse.rpc.marketing',
        ),
    ),
    'zf-content-validation' => array(
        'datawarehouse\\V1\\Rpc\\Marketing\\Controller' => array(
            'input_filter' => 'datawarehouse\\V1\\Rpc\\Marketing\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'datawarehouse\\V1\\Rpc\\Marketing\\Validator' => array(
            0 => array(
                'name' => 'campaigns',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
);
