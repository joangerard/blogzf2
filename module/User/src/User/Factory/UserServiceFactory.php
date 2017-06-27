<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:41 PM
 */

namespace User\Factory;

use User\Service\UserService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserServiceFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UserService(
            $serviceLocator->get('User\Mapper\UserMapperInterface')
        );
    }
}