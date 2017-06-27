<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:28 PM
 */
namespace User\Service;

interface UserServiceInterface{
    public function find($id);
    public function findByUserName($username);
}