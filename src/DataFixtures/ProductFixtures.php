<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1->setName('Chaise')
                 ->setCategory('Meuble')
                 ->setPrice('45.5');
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Pomme')
                 ->setCategory('Fruit')
                 ->setPrice('2');
        $manager->persist($product2);



        $manager->flush();
    }
}
