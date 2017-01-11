<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    private $airportCode;
    private $name;
    private $location;
    private $gpsCoordinates;

    /**
     * Airport constructor.
     * @param $airportCode
     * @param $name
     * @param $location
     */
    public function __construct($airportCode, $name, $location, $gpsCoordinates)
    {
        $this->airportCode = $airportCode;
        $this->name = $name;
        $this->location = $location;
        $this->gpsCoordinates = $gpsCoordinates;
    }

    /**
     * @return mixed
     */
    public function getAirportCode()
    {
        return $this->airportCode;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return null
     */
    public function getGpsCoordinates()
    {
        return $this->gpsCoordinates;
    }


}
