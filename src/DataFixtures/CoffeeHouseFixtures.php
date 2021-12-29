<?php

namespace App\DataFixtures;

use App\Entity\CoffeeHouse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CoffeeHouseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new CoffeeHouse())->setName('Test1 Belka'));
        $manager->persist((new CoffeeHouse())->setName('Test2 Strelka'));
        $manager->persist((new CoffeeHouse())->setName('Test2 Biiiiiiiig tasty coffee'));
        $manager->flush();
    }
}
