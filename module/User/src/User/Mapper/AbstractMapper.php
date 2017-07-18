<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/22/2017
 * Time: 5:29 PM
 */
//https://stackoverflow.com/questions/14021870/zf2-how-to-get-service-manager-in-mapper
namespace User\Mapper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AbstractMapper implements ServiceLocatorAwareInterface
{
    protected $service_manager;
    protected $em;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->service_manager = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->service_manager;
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
}
