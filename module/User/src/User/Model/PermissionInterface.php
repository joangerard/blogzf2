<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 1:39 PM
 */
namespace User\Model;

interface PermissionInterface {
    public function GetId();
    public function GetName();
    public function SetName($name);
    public function GetCode();
    public function SetCode($code);
}