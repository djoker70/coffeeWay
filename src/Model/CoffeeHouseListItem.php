<?php

namespace App\Model;

use App\DBAL\Types\Geolocation\Point;

class CoffeeHouseListItem
{
    private int $id;

    private string $name;

    private Point $coordinates;

    /**
     * @param int $id
     * @param string $name
     * @param Point $coordinates
     */
    public function __construct(int $id, string $name, Point $coordinates)
    {
        $this->id = $id;
        $this->name = $name;
        $this->coordinates = $coordinates;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Point
     */
    public function getCoordinates(): Point
    {
        return $this->coordinates;
    }
}
