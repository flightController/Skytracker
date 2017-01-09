<?php

namespace App\Http\Controllers;

use App\lib\FlightAwareJsonAdapter;
use App\lib\OpenWeatherJsonAdapter;
use App\lib\WikipediaJsonAdapter;
use Illuminate\Http\Request;
use App\Flight;
use App\lib\FlickrJsonAdapter;
use App\Airport;
use App\UserSetting;
use App\Weather;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function flightList(){

        $userSettings = UserSetting::where('user_id', '=', Auth::user()->id) -> first();
        if(!isset($userSettings)){
            $userSettings = UserSetting::create([
                'user_id' => Auth::user()->id,
                'home_airport' => 'LSZH',
                'number_of_flights' => 5,
                'refresh_time' => 300,
                'test_mode' => 1,
            ]);
        }

        $numberOfFlights = $userSettings -> number_of_flights;
        $homeAirport = $userSettings -> home_airport;
        $test_mode = $userSettings -> test_mode;

        if($test_mode){
            $flights = $this->getTestFlights($numberOfFlights);
        } else{
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flights = $adapter -> getDepartedFlights($homeAirport, $numberOfFlights);
        }

        $cityDescriptions = $this->getWikiTexts($flights);
        $cityPictures = $this->getListViewCityPictures($flights);

        $openWeatherJSONAdapter = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
        foreach ($flights as $flight){
            $weather[$flight -> getDestination() -> getLocation()] = $openWeatherJSONAdapter ->getWeather($flight -> getDestination() -> getGpsCoordinates());
        }

        $data = array(
            'flights' => $flights,
            'cityDescriptions' => $cityDescriptions,
            'cityPictures' => $cityPictures,
            'weather' => $weather,
            'refreshTime' => $userSettings -> refresh_time,
        );
        return view('flightListView', $data);

    }

    public function flight($ident){
        $userSettings = UserSetting::where('user_id', '=', Auth::user()->id) -> first();
        if(!isset($userSettings)){
            echo 'No User Settings found';
        }

        if($userSettings -> test_mode){
            $flight = $this->getTestFlight();
        } else {
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flight = $adapter ->getFlight($ident);
        }

        $flickerAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);
        $planePicture = $flickerAdapter ->getSmallPictures($flight -> getAircraft(), 1);

        $cityDescription = $this->getWikiText($flight);
        $cityPictures = $this->getDetailViewCityPictures($flight);

        $openWeatherJSONAdapter = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
        $weather = $openWeatherJSONAdapter ->getWeather($flight -> getDestination() -> getGpsCoordinates());

        $data = array(
            'flight' => $flight,
            'cityDescription' => $cityDescription,
            'cityPictures' => $cityPictures,
            'planePicture' => $planePicture,
            'weather' => $weather,
            'refreshTime' => $userSettings -> refresh_time,
        );

        return view('flightDetailView', $data);
    }

    private function getWikiText(Flight $flight): string
    {
        $wikipediaAdapter = new WikipediaJsonAdapter();
        return $wikipediaAdapter->getShortCityDescription($flight->getDestination()->getLocation());
    }

    private function getWikiTexts(array $flights): array
    {
        $wikipediaAdapter = new WikipediaJsonAdapter();
        $cityDescriptions = array();
        foreach ($flights as $flight) {
            $cityDescriptions[$flight->getDestination()->getLocation()] = $wikipediaAdapter->getShortCityDescription($flight->getDestination()->getLocation());
        }
        return $cityDescriptions;
    }

    private function getListViewCityPictures(array $flights): array
    {
        $flickJsonAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);
        $cityPictures = array();

        foreach ($flights as $flight) {
            $city = $flight->getDestination()->getLocation();
            $cityPicture = $flickJsonAdapter->getSmallPictures($city, 1);
            if(isset($cityPicture[0])){
                $cityPictures[$city] = $cityPicture[0];
            } else {
                $cityPictures[$city] = "";
            }
        }
        return $cityPictures;
    }

    private function getDetailViewCityPictures(Flight $flight): array
    {
        $flickJsonAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);

        $city = $flight->getDestination()->getLocation();
        $cityPictures = $flickJsonAdapter->getFullPictures($city, 8);

        return $cityPictures;
    }

    private function getTestFlight()
    {
        $airport = new Airport('BSL', 'Basel', 'Basel');
        $flight = new Flight('BSL1337', 'Swiss International', $airport, $airport, "A380", null);
        return $flight;

    }

    private function getTestFlights($number_of_flights)
    {
        $flights = array();
        for ($i = 0; $i < $number_of_flights; $i++) {
            $flights[] = $this->getTestFlight();
        }

        return $flights;
    }
}
