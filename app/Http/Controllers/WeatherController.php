<?php

namespace App\Http\Controllers;

use app\Weather;

class WeatherController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return Weather
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = $this->getDataToDisplay();
        return view('flightDetailView', $data);
    }

    private function getDataToDisplay()
    {
        $weather = Weather::where('city', '=', 'Basel');
        $data = array(
            'temperature' => $weather->temperature,
            'weathercondition' => $weather->weathercondition,
        );
        return $data;
    }

}?>