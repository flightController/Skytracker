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
    private $speed;
    private $flightRoute;

    public function __construct(string $ident, string $airline, Airport $origin = null, Airport $destination, string $aircraft = "", GPSCoordinates $gpsCoordinates = null, int $departureTime = null, int $arrivalTime = null, int $speed = 0, array $flightRoute = [])
    {
        $this->ident = $ident;
        $this->airline = $airline;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->aircraft = $aircraft;
        $this->gpsCoordinates = $gpsCoordinates;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->speed = $speed;
        $this->flightRoute = $flightRoute;
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
        if ($this->departureTime == "0") {
            $string = "Keine Abflugzeit verfügbar";
            return $string;
        }
        else {
            $timestamp = ($this->departureTime + (60 * 60));
            $time = date("H:i", $timestamp);
            return $time;
        }
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {

        if ($this->arrivalTime == "0") {
            $string = "Keine Ankunftzeit verfügbar";
            return $string;
        }
        else {
            $timestamp = ($this->arrivalTime + (60 * 60));
            $time = date("H:i", $timestamp);
            return $time;
        }
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        $speedkmh = ($this->speed * 1.852);
        round($speedkmh, 0);
        return $speedkmh;
    }

    /**
     * @return mixed
     */
    public function getFlightRoute()
    {
        return $this->flightRoute;
    }


}
