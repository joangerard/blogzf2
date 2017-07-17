<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 11:33 AM
 */

namespace User\Model;

interface UserTypeInterface
{
    public function getId();
    public function getName();
    public function setName($name);
    public function addUser(UserInterface $user);
}
