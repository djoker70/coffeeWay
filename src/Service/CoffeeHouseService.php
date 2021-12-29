<?php

namespace App\Service;

use App\Entity\CoffeeHouse;
use App\Model\CoffeeHouseListItem;
use App\Model\CoffeeHousesListResponse;
use App\Repository\CoffeeHouseRepository;

class CoffeeHouseService
{
    public function __construct(private CoffeeHouseRepository $coffeeHouseRepository)
    {
    }

    public function getAllCoffeeHouses(): CoffeeHousesListResponse
    {
        $coffeeHouses = $this->coffeeHouseRepository->findAll();
        $items = array_map(
            fn (CoffeeHouse $coffeeHouse) => new CoffeeHouseListItem(
                $coffeeHouse->getId(),
                $coffeeHouse->getName()
            ), $coffeeHouses);
        return new CoffeeHousesListResponse($items);
    }
}
