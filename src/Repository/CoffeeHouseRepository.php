<?php

namespace App\Repository;

use App\DBAL\Types\Geolocation\Point;
use App\Entity\CoffeeHouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
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

    public function getCoffeeHousesNearList(Point $point)
    {
        $lon = $point->getLongitude();
        $lat = $point->getLatitude();
        $sql = "SELECT
                    id,
                    coordinates
                FROM coffee_house
                order by coordinates <-> '37.623523,55.759517'
                LIMIT 5";
    }

    public function getCoffeeHousesInRadiusPointList(Point $point, float $radiusInDegrees)
    {
        $lon = $point->getLongitude();
        $lat = $point->getLatitude();
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('App\Entity\CoffeeHouse', 'ch');
        $rsm->addFieldResult('ch', 'id', 'id');
        $rsm->addFieldResult('ch', 'name', 'name');
        $rsm->addFieldResult('ch', 'coordinates', 'coordinates');

        $sql = "SELECT
                    ch.id,
                    ch.name,
                    ch.coordinates
                FROM coffee_house ch
                WHERE ch.coordinates <@ circle '(($lon,$lat), $radiusInDegrees)'";
        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);

        return $query->getResult();
    }
}
