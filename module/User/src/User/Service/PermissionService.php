<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:36 PM
 */

namespace User\Service;

use Blog\Service\PermissionServiceInterface;
use User\Mapper\PermissionMapperInterface;

class PermissionService implements PermissionServiceInterface{
    protected $permissionMapper;

    public function __construct(
        PermissionMapperInterface $permissionMapper
    )
    {
        $this->permissionMapper = $permissionMapper;
    }

    public function getAll()
    {
        $this->permissionMapper->getAll();
    }
}