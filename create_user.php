<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 11:06 AM
 */


require_once "bootstrap.php";

use User\Model\User;

$newUsers = $argv[1];

$user = new  User();
$user->setFirstname("Juan");

$entityManager->persist($user);
$entityManager->flush();

echo "Created Product with ID " . $user->getId() . "\n";