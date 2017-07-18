<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:25 PM
 */

namespace User\Mapper;

use User\Model\Permission;
use User\Model\User;
use User\Model\UserInterface;
use User\Model\UserType;

class DoctrineDbSqlUserMapper extends AbstractMapper implements UserMapperInterface
{

    protected $userRepository;

    public function __construct($userRepository)
    {
        $this->userRepository=$userRepository;
    }

    public function find($id)
    {
        return $this->getEntityManager()->find($this->userRepository, $id);
    }

    public function findByUserName($username)
    {
        return $this->getEntityManager()->getRepository($this->userRepository)->findOneBy(array('username'=>$username));
    }
}