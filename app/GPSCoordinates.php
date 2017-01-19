<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GPSCoordinates extends Model
{
    private $latitude;
    private $longitude;
    private $altitude;

    /**
     * GPSCoordinates constructor.
     * @param $latitude
     * @param $longitude
     * @param $altitude
     */
    public function __construct($latitude, $longitude, $altitude=30.95)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }

    /**
     * @return array
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return int
     */
    public function getAltitude()
    {
        $altitudemeters = $this->altitude * 20.273;
        round($altitudemeters, 0);
        return $altitudemeters;
    }

}
