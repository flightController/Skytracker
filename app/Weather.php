<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
private $temperature;
private $weatherCondition;
private $cloud;
private $wind;
private $icon;
private $city;
private $country;

    public function __construct($temperature, $weatherCondition, $cloud, $wind, $icon)
    {
        $this->temperature = $temperature;
        $this->weatherCondition = $weatherCondition;
        $this->cloud = $cloud;
        $this->wind = $wind;
        $this->icon = $icon;
    }

    /**
     * @return array
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @return mixed
     */
    public function getWeatherCondition()
    {
        return $this->weatherCondition;
    }

    /**
     * @return mixed
     */
    public function getCloud()
    {
        return $this->cloud;
    }

    /**
     * @return mixed
     */
    public function getWind()
    {
        return $this->wind;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
}