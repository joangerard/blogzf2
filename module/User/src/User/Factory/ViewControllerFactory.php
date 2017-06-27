<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 5:02 PM
 */

namespace User\Factory;

use User\Controller\ViewController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ViewControllerFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $userService = $realServiceLocator->get('User\Service\UserServiceInterface');
        return new ViewController($userService);
    }
}