<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 9:42 AM
 */

namespace User\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Model\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname("Juan");
        $user->setUsername("Juan64");
        $user->setAddress1("Lidio Ustares 541b");

        $manager->persist($user);
        $manager->flush();
    }
}
