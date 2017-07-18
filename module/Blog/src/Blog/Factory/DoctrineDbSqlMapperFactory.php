<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 8:57 AM
 */

namespace Blog\Factory;

use Blog\Factory\Custom\MyBlogFactory;
use Blog\Mapper\DoctrineDbSqlMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineDbSqlMapperFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new DoctrineDbSqlMapper(
            new MyBlogFactory()
        );
    }
}
