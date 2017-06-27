<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:47 PM
 */

namespace User\Service;

use User\Mapper\UserMapperInterface;

class AuthenticationService implements AuthenticationServiceInterface{

    protected $userMapper;

    public function __construct(
        UserMapperInterface $userMapper
    )
    {
        $this->userMapper = $userMapper;
    }

    public function LogIn($username, $password)
    {
        $user = $this->userMapper->findByUserName($username);
        if(NULL !== $user && $user->GetPassword()===$password)
        {
            return $user;
        }
        return NULL;
    }
    public function Logout($username)
    {
        // TODO: Implement Logout() method.
    }
}