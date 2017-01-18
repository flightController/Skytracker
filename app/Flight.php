<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    private $ident;
    private $airline;
    private $origin;
    private $destination;
    private $aircraft;
    private $gpsCoordinates;
    private $departureTime;
    private $arrivalTime;

    /**
     * Flight constructor.
     * @param $ident
     * @param $airline
     * @param $origin
     * @param $destination
     * @param $aircraft
     * @param $gpsCoordinates
     */
    public function __construct(string $ident, string $airline = "", Airport $origin, Airport $destination, string $aircraft = "", GPSCoordinates $gpsCoordinates = null, $departureTime, $arrivalTime)
    {
        $this->ident = $ident;
        $this->airline = $airline;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->aircraft = $aircraft;
        $this->gpsCoordinates = $gpsCoordinates;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return string
     */
    public function getIdent(): string
    {
        return $this->ident;
    }

    /**
     * @return string
     */
    public function getAirline(): string
    {
        return $this->airline;
    }

    /**
     * @return Airport
     */
    public function getOrigin(): Airport
    {
        return $this->origin;
    }

    /**
     * @return Airport
     */
    public function getDestination(): Airport
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getAircraft(): string
    {
        return $this->aircraft;
    }

    /**
     * @return string
     */
    public function getFlightstate(): string
    {
        return $this->flightstate;
    }

    /**
     * @return GPSCoordinates
     */
    public function getGpsCoordinates(): GPSCoordinates
    {
        return $this->gpsCoordinates;
    }

    /**
     * @return mixed
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

}
