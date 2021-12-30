<?php

namespace App\DBAL\Types\Geolocation;

class Point
{
    private $latitude;
    private $longitude;

    /**
     * Point constructor.
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
