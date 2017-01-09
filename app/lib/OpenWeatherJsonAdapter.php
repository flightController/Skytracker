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
    private function getTemperature(string $latitude, string $longitude)
    {
        $url = ($this->baseUrl . "lat=$latitude&lon=$longitude" . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $temperature = $data['main']['temp'];

        return $temperature;
    }
    private function getWeathercondition(string $latitude, string $longitude)
    {
        $url = ($this->baseUrl . $latitude . "," . $longitude . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $weathercondition = $data['weather'][0]['description'];
        return $weathercondition;
    }
    private function getCloud(string $latitude, string $longitude)
    {
        $url = ($this->baseUrl . $latitude . "," . $longitude . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get cloud percentage
        $cloud = $data['clouds']['all'];
        return $cloud;
    }
    private function getWind(string $latitude, string $longitude)
    {
        $url = ($this->baseUrl . $latitude . "," . $longitude . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get wind speed
        $wind = $data['wind']['speed'];
        return $wind;
    }
    private function getIcon(string $latitude, string $longitude)
    {
        $url = ($this->baseUrl . $latitude . "," . $longitude . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $icon = $data['weather'][0]['icon'];
        return $icon;
    }

    public function getWeather(GPSCoordinates $gpsCoordinates) : Weather
    {

        $latitude = $gpsCoordinates -> getLongitude();
        $longitude = $gpsCoordinates -> getLatitude();
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

