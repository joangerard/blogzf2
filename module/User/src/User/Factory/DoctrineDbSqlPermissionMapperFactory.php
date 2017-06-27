<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:32 PM
 */
namespace User\Factory;

use User\Mapper\DoctrineDbSqlPermissionMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineDbSqlPermissionMapperFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
       return new DoctrineDbSqlPermissionMapper('User\Model\Permission');
    }
}