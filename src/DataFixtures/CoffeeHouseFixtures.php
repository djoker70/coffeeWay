<?php

namespace App\DataFixtures;

use App\DBAL\Types\Geolocation\Point;
use App\Entity\CoffeeHouse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CoffeeHouseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist(
            (new CoffeeHouse())
                ->setName('Test1 Belka')
                ->setCoordinates(new Point(55.760038, 37.617799)));

        $manager->persist(
            (new CoffeeHouse())
                ->setName('Test2 Strelka')
                ->setCoordinates(new Point(55.759517, 37.623523)));

        $manager->persist(
            (new CoffeeHouse())
                ->setName('Test2 Biiiiiiiig tasty coffee')
                ->setCoordinates(new Point(55.742129, 37.641079)));
        $manager->flush();
    }
}
