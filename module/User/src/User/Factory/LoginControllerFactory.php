<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 5:15 PM
 */
namespace User\Factory;

use User\Controller\LoginController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginControllerFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        return new LoginController(
            $realServiceLocator->get('User\Service\AuthenticationServiceInterface'),
            $realServiceLocator->get('FormElementManager')->get('User\Form\LoginForm'),
            $realServiceLocator->get('User\Service\SessionServiceInterface')
        );
    }
}