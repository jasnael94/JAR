<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setName('Army')
              ->setEmail('arm@wall.com')
              ->setPassword('malagasy123*')
              ->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('Guess')
              ->setEmail('gaz@wall.com')
              ->setPassword('street$ù*')
              ->setRoles(['ROLE_USER']);
        $manager->persist($user2);

        $manager->flush();
    }
}
