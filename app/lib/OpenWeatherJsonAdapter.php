<?php

namespace App\lib;

class OpenWeatherJsonAdapter
{
    private $apiKey;
    private $baseUrl = 'http://api.openweathermap.org/data/2.5/weather?q=';
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
    private function getTemperature(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get current Temperature in Celsius
        $temperature = $data['main']['temp'];
        //Get weather condition
        //$weathercondition = $data['weather'][0]['main'];
        //Get cloud percentage
        //$cloud = $data['clouds']['all'];
        //Get wind speed
        //$wind = $data['wind']['speed'];
        return $temperature;
        //return $weathercondition;
        //return $cloud;
        //return $wind;
        // return $data;
    }
    private function getWeathercondition(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $weathercondition = $data['weather'][0]['description'];
        return $weathercondition;
    }
    private function getCloud(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get cloud percentage
        $cloud = $data['clouds']['all'];
        return $cloud;
    }
    private function getWind(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get wind speed
        $wind = $data['wind']['speed'];
        return $wind;
    }
    private function getIcon(string $city, string $country)
    {
        $url = ($this->baseUrl . $city . "," . $country . $this->extendUrl . $this->language . '&appid=' . $this->apiKey . '&mode=json');
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        //Get weather condition
        $icon = $data['weather'][0]['icon'];
        return $icon;
    }

    public function getWeather(string $city, string $country)
    {
        $temperature = $this->getTemperature($city, $country);
        $weathercondition = $this->getWeathercondition($city, $country);
        $cloud = $this->getCloud($city, $country);
        $wind = $this->getWind($city, $country);
        $icon = $this->getIcon($city, $country);

        return new Weather($temperature, $weathercondition, $cloud, $wind, $icon, $city, $country);
    }

}

