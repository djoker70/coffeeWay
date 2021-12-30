<?php

namespace App\Service;

use App\Entity\CoffeeHouse;
use App\Model\CoffeeHouseListItem;
use App\Model\CoffeeHousesList;
use App\Repository\CoffeeHouseRepository;

class CoffeeHouseService
{
    public function __construct(private CoffeeHouseRepository $coffeeHouseRepository)
    {
    }

    public function getAllCoffeeHousesList(): CoffeeHousesList
    {
        $coffeeHouses = $this->coffeeHouseRepository->findAll();
        $items = array_map(
            fn (CoffeeHouse $coffeeHouse) => new CoffeeHouseListItem(
                $coffeeHouse->getId(),
                $coffeeHouse->getName(),
                $coffeeHouse->getCoordinates()
            ), $coffeeHouses);
        return new CoffeeHousesList($items);
    }
}
