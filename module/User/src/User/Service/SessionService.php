<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/13/2017
 * Time: 12:24 PM
 */
namespace User\Service;

use Zend\Session\Container;

class SessionService implements SessionServiceInterface
{
    public function __construct()
    {
    }

    public function getSession($name, $key)
    {
        $container = new Container($name);
        return $container->offsetGet($key);
    }
    public function save($name, $key, $value)
    {
        $session = new Container($name);
        $session[$key] = $value;
    }
    public function unsetSession($name, $key)
    {
        $container = new Container($name);
        $container->offsetUnset($key);
    }
}
