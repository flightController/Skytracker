<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    private $airportCode;
    private $name;
    private $location;

    /**
     * Airport constructor.
     * @param $airportCode
     * @param $name
     * @param $location
     */
    public function __construct($airportCode, $name, $location)
    {
        $this->airportCode = $airportCode;
        $this->name = $name;
        $this->location = $location;
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
}
