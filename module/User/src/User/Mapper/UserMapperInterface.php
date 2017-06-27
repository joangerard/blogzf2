<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:24 PM
 */
namespace User\Mapper;

interface UserMapperInterface{
    public function find($id);
    public function findByUserName($username);
}