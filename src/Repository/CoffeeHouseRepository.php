<?php

namespace App\Repository;

use App\Entity\CoffeeHouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoffeeHouse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoffeeHouse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoffeeHouse[]    findAll()
 * @method CoffeeHouse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoffeeHouseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoffeeHouse::class);
    }
}
