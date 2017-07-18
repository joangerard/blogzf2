<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:45 PM
 */

namespace User\Factory;

use User\Mapper\DoctrineDbSqlUserMapper;
use User\Model\User;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineDbSqlUserMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new DoctrineDbSqlUserMapper(
            User::class
        );
    }
}
