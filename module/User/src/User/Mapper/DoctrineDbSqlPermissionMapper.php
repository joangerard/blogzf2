<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:27 PM
 */

namespace User\Mapper;

class DoctrineDbSqlPermissionMapper extends AbstractMapper implements PermissionMapperInterface
{
    protected $permissionRepository;

    public function __construct($permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll()
    {
        $this->getEntityManager()->getRepository($this->permissionRepository)->findAll();
    }
}
