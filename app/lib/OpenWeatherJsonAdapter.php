<?php

namespace App\lib;

use App\GPSCoordinates;
use App\Weather;

class OpenWeatherJsonAdapter
{
    private $apiKey;
    private $baseUrl = 'http://api.openweathermap.org/data/2.5/weather?';
    private $extendUrl = '&units=metric&cnt=7&lang=';
    private $language = 'de';
    /**
     * OpenWeatherJsonAdapter constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather(GPSCoordinates $gpsCoordinates) : Weather
    {

        $latitude = $gpsCoordinates -> getLatitude();
        $longitude = $gpsCoordinates -> getLongitude();
        $url = ($this->baseUrl . "lat=$latitude&lon=$longitude" . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $temperature = $data['main']['temp'];
        $weatherCondition = $data['weather'][0]['description'];
        $cloud = $data['clouds']['all'];
        $wind = $data['wind']['speed'];
        $icon = $data['weather'][0]['icon'];

        return new Weather($temperature, $weatherCondition, $cloud, $wind, $icon);
    }

}

