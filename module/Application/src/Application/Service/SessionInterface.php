<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/27/2017
 * Time: 10:33 AM
 */
namespace Application\Service;

interface SessionInterface {
    public function read($key);
    public function write($key,$value);
}