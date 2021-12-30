<?php

namespace App\Entity;

use App\DBAL\Types\Geolocation\Point;
use App\Repository\CoffeeHouseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoffeeHouseRepository::class)]
class CoffeeHouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'point')]
    private Point $coordinates;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCoordinates(): Point
    {
        return $this->coordinates;
    }

    /**
     * @param Point $coordinates
     * @return CoffeeHouse
     */
    public function setCoordinates(Point $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }
}
