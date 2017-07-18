<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 1:39 PM
 */
namespace User\Model;

interface PermissionInterface
{
    public function getId();
    public function getName();
    public function setName($name);
    public function getCode();
    public function setCode($code);
}