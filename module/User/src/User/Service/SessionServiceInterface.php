<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/13/2017
 * Time: 12:18 PM
 */
namespace User\Service;

interface SessionServiceInterface
{
    public function save($name, $key, $value);
    public function getSession($name, $key);
    public function unsetSession($name, $key);
}
