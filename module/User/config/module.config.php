<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:48 PM
 */

namespace User;
use User\Factory\SessionServiceFactory;
use User\Service\SessionService;
// Filename: /module/Authentication/config/module.config.php


return array(
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Model')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=blog;host=localhost;port:8080',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'User\Mapper\PermissionMapperInterface'   => 'User\Factory\DoctrineDbSqlPermissionMapperFactory',
            'User\Mapper\UserMapperInterface'   => 'User\Factory\DoctrineDbSqlUserMapperFactory',
            'User\Service\AuthenticationServiceInterface'=>'User\Factory\AuthenticationServiceFactory',
            'User\Service\PermissionServiceInterface'=>'User\Factory\PermissionServiceFactory',
            'User\Service\UserServiceInterface' => 'User\Factory\UserServiceFactory',
        ),
        'invokables' => array(
            'User\Service\SessionServiceInterface' => SessionService::class
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'User\Controller\View' => 'User\Factory\ViewControllerFactory',
            'User\Controller\Login' => 'User\Factory\LoginControllerFactory',
        )
    ),
    // This lines opens the configuration for the RouteManager
    'router' => array(
        'routes' => array(
            'authentication' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'User\Controller\Login',
                        'action'     => 'login',
                    ),
                ),
            ),
            'login'=>array(
                'type'=>'literal',
                'options' => array(
                    'route'=>'/login',
                    'defaults'=>array(
                        'controller'=>'User\Controller\Login',
                        'action'    => 'login'
                    )
                )

            ),
            'logged'=>array(
                'type'=>'literal',
                'options' => array(
                    'route'=>'/logged',
                    'defaults'=>array(
                        'controller'=>'User\Controller\Login',
                        'action'    => 'logged'
                    )
                )

            ),
            'notlogged'=>array(
                'type'=>'literal',
                'options' => array(
                    'route'=>'/notlogged',
                    'defaults'=>array(
                        'controller'=>'User\Controller\Login',
                        'action'    => 'notlogged'
                    )
                )
            ),
            'logout'=>array(
                'type'=>'literal',
                'options' => array(
                    'route'=>'/logout',
                    'defaults'=>array(
                        'controller'=>'User\Controller\Login',
                        'action'    => 'logout'
                    )
                )

            ),
        )
    )
);