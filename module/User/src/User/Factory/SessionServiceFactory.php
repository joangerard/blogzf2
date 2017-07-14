<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/13/2017
 * Time: 3:11 PM
 */

namespace User\Factory;

use User\Service\SessionService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SessionServiceFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SessionService();
    }
}