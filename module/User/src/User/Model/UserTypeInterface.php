<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 11:33 AM
 */

namespace User\Model;

interface UserTypeInterface{
    public function getId();
    public function GetName();
    public function SetName($name);
    public function Adduser(UserInterface $user);
}