<?php

namespace App\DBAL\Types\PSQL;

use App\DBAL\Types\Geolocation\Point;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PointType extends Type
{
    public const POINT = 'point';

    /**
     * @param array $column
     * @param AbstractPlatform $platform
     * @return string
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return 'POINT';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::POINT;
    }

    /**
     * @param mixed $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Point
    {
        list($longitude, $latitude) = sscanf($value, '(%f, %f)');

        return new Point($latitude, $longitude);
    }

    /**
     * @param mixed $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getLongitude().','.$value->getLatitude();
    }

    /**
     * @param string $sqlExpr
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform): string
    {
        return sprintf('PointFromText(%s)', $sqlExpr);
    }
}
