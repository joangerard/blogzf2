<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 3:42 PM
 */

require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);