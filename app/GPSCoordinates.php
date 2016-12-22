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
    public function __construct($latitude, $longitude, $altitude = 0)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }
}
