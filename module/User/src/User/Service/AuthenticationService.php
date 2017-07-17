<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:47 PM
 */

namespace User\Service;

use User\Mapper\UserMapperInterface;

class AuthenticationService implements AuthenticationServiceInterface
{

    protected $userMapper;

    public function __construct(
        UserMapperInterface $userMapper
    ) {
        $this->userMapper = $userMapper;
    }

    public function logIn($username, $password)
    {
        $user = $this->userMapper->findByUserName($username);
        if (null !== $user && $user->getPassword() === $password) {
            return $user;
        }

        return null;
    }

    public function logout($username)
    {
        // TODO: Implement Logout() method.
    }
}
