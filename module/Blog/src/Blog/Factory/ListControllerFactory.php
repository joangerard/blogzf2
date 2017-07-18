<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 11:43 AM
 */

namespace Blog\Factory;

use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $postService        = $realServiceLocator->get('Blog\Service\PostServiceInterface');
        $sessionService     = $realServiceLocator->get('User\Service\SessionServiceInterface');
        $userPermissionHelper = $realServiceLocator->get('Blog\Helper\UserPermissionHelperInterface');
        $userService = $realServiceLocator->get('User\Service\UserServiceInterface');
        return new ListController(
            $postService,
            $sessionService,
            $userPermissionHelper,
            $userService
        );
    }
}
