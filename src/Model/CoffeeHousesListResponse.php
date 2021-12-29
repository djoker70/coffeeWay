<?php

namespace App\Model;

class CoffeeHousesListResponse
{
    /**
     * @var CoffeeHouseListItem[]
     */
    private array $items;

    /**
     * @param CoffeeHouseListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CoffeeHouseListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
