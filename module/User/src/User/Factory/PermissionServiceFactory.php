<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:39 PM
 */
namespace User\Factory;

use User\Service\PermissionService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PermissionServiceFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PermissionService(
            $serviceLocator->get('User\Mapper\PermissionMapperInterface')
        );
    }
}