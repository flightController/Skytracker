<?php

namespace App\lib;

use App\Airport;
use App\Flight;
use App\GPSCoordinates;

class FlightAwareJsonAdapter
{
    private $username;
    private $apiKey;
    private static $baseUrl = 'http://flightxml.flightaware.com/json/FlightXML2/';

    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }

    private function get(string $endpoint, array $params)
    {
        $ch = curl_init(self::$baseUrl . $endpoint . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'FlightAware REST PHP Library 0.1');
        $output = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($responseCode === 401) {
            throw new RuntimeException('Authentication failed; use your FlightAware username and API key.', 401);
        } else if ($responseCode !== 200) {
            throw new RuntimeException($output, $responseCode);
        }
        curl_close($ch);
        $result = json_decode($output);
        if (isset($result->error)) {
            if ($result->error === 'no data available') {
                throw new InvalidArgumentException('no data available', 404);
            }
            throw new RuntimeException($result->error, 400);
        }
        return $result;
    }


    private function getInFlightInfo($ident)
    {
        $result = $this->get('InFlightInfo', array('ident' => $ident))->InFlightInfoResult;
        if (!strlen($result->faFlightID)) {
            return null;
        }
        $waypoints = array();
        $currentWaypoint = array();
        foreach (explode(' ', $result->waypoints) as $coordinate) {
            if (isset($currentWaypoint['latitude'])) {
                $currentWaypoint['longitude'] = $coordinate;
                $waypoints[] = $currentWaypoint;
                $currentWaypoint = array();
            } else {
                $currentWaypoint['latitude'] = $coordinate;
            }
        }
        $result->waypoints = $waypoints;
        return $result;
    }

    public function getFlightRoute(string $ident){
        $params = array('ident' => $ident,
            );
        return $this -> get('GetLastTrack', $params)->GetLastTrackResult->data;
    }

    public function getAirportInfo($airportCode){
        $params = array('airportCode' => $airportCode);
        return $this -> get('AirportInfo', $params)->AirportInfoResult;
    }

    private function getDepartedInfo(string $airport, int $howMany, string $filter, int $offset)
    {
        $params = array('airport' => $airport,
            'howMany' => $howMany,
            'filter' => $filter,
            'offset' => $offset,
        );
        return $this -> get('Departed', $params);
    }

    public function getFlight(string $ident) : Flight
    {
        $flightInfo = $this->getInFlightInfo($ident);
        if(empty($flightInfo)) {
            return null;
        }

        $destinationInfo = $this->getAirportInfo($flightInfo -> destination);
        $destinationsGPS = new GPSCoordinates($destinationInfo -> latitude, $destinationInfo ->longitude);
        $destination = new Airport($flightInfo -> destination, $destinationInfo -> name, $destinationInfo -> location, $destinationsGPS);

        $originInfo = $this->getAirportInfo($flightInfo -> origin);
        $originGPS = new GPSCoordinates($originInfo -> latitude, $originInfo ->longitude);
        $origin = new Airport($flightInfo -> origin, $originInfo -> name, $originInfo -> location, $originGPS);
        $departureTime = $flightInfo -> departureTime;
        $arrivalTime = $flightInfo -> arrivalTime;
        $groundSpeed = $flightInfo -> groundspeed;
        $flightRoute = $this->getFlightRoute($ident);

        $gpsCoordinates = new GPSCoordinates($flightInfo -> latitude, $flightInfo -> longitude, $flightInfo ->altitude);
        $flight = new Flight($ident,"", $origin, $destination, $flightInfo -> type, $gpsCoordinates, $departureTime, $arrivalTime, $groundSpeed, $flightRoute);
        return $flight;
    }

    public function getDepartedFlights(string $originAirportCode, $howMany) : array
    {
        $departedResult = $this->getDepartedInfo($originAirportCode, $howMany, 'airline', 0);
        $flights = array();

        $departedResult = $departedResult -> DepartedResult;
        $departures = $departedResult -> departures;

        foreach ($departures as $departedInfo){
            $destinationInfo = $this->getAirportInfo($departedInfo -> destination);
            $destinationsGPS = new GPSCoordinates($destinationInfo -> latitude, $destinationInfo ->longitude);
            $destination = new Airport($departedInfo -> destination, $destinationInfo -> name, $destinationInfo -> location, $destinationsGPS);

            $flights[] = new Flight($departedInfo -> ident,"", null, $destination, "", null, 0, 0, 0,[]);
        }
        return $flights;
    }
}