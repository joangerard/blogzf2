<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:29 PM
 */
namespace User\Service;

use User\Mapper\UserMapperInterface;

class UserService implements UserServiceInterface
{
    protected $userMapper;

    public function __construct(
        UserMapperInterface $userMapper
    ) {
        $this->userMapper = $userMapper;
    }

    public function find($id)
    {
        return $this->userMapper->find($id);
    }

    public function findByUserName($username)
    {
        return $this->userMapper->findByUserName($username);
    }
}
