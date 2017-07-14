<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:09 PM
 */

namespace User\Model;

interface UserInterface
{
    public function getId();

    public function getFirstName();

    public function getSecondName();

    public function getAddress1();

    public function getPhone1();

    public function getUsername();

    public function getPassword();

    public function getType();

    public function getPermissions();

    public function addPermission($permission);

    public function getPosts();

    public function addPost($post);
}