<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 10:49 AM
 */
namespace Blog;
// Filename: /module/Blog/config/module.config.php
 use Blog\Helper\UserPermissionHelper;

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
             'Blog\Mapper\UserMapperInterface'   => 'Blog\Factory\DoctrineDbSqlUserMapperFactory',
             'Blog\Service\UserServiceInterface' => 'Blog\Factory\UserServiceFactory',
             'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\DoctrineDbSqlMapperFactory',
             'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
             'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
         ),
         'invokables' => array(
             'Blog\Helper\UserPermissionHelperInterface' => UserPermissionHelper::class,
         )
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             __DIR__ . '/../view',
         ),
     ),
     'controllers' => array(
         'factories' => array(
             'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
             'Blog\Controller\Write' => 'Blog\Factory\WriteControllerFactory',
             'Blog\Controller\Delete' => 'Blog\Factory\DeleteControllerFactory'
         )
     ),
     // This lines opens the configuration for the RouteManager
     'router' => array(
         'routes' => array(
             'blog' => array(
                 'type' => 'literal',
                 'options' => array(
                     'route'    => '/blog',
                     'defaults' => array(
                         'controller' => 'Blog\Controller\List',
                         'action'     => 'index',
                     ),
                 ),
                 'may_terminate' => true,
                 'child_routes'  => array(
                     'detail' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/:id',
                             'defaults' => array(
                                 'action' => 'detail'
                             ),
                             'constraints' => array(
                                 'id' => '[1-9]\d*'
                             )
                         )
                     ),
                     'add' => array(
                         'type' => 'literal',
                         'options' => array(
                             'route'    => '/add',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Write',
                                 'action'     => 'add'
                             )
                         )
                     ),
                     'edit' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/edit/:id',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Write',
                                 'action'     => 'edit'
                             ),
                             'constraints' => array(
                                 'id' => '\d+'
                             )
                         )
                     ),
                     'delete' => array(
                         'type' => 'segment',
                         'options' => array(
                             'route'    => '/delete/:id',
                             'defaults' => array(
                                 'controller' => 'Blog\Controller\Delete',
                                 'action'     => 'delete'
                             ),
                             'constraints' => array(
                                 'id' => '\d+'
                             )
                         )
                     ),
                 )
             )
         )
     )
 );