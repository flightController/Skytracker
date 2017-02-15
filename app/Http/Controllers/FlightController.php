<?php

namespace App\Http\Controllers;

use App\GPSCoordinates;
use App\lib\FlightAwareJsonAdapter;
use App\lib\OpenWeatherJsonAdapter;
use App\lib\WikipediaJsonAdapter;
use Illuminate\Http\Request;
use App\Flight;
use App\lib\FlickrJsonAdapter;
use App\Airport;
use App\UserSetting;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
     * Controller for flights. Returns a view with an overview of different flights.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flightList(){

        $starttime = microtime(true);
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

        $endtime = microtime(true);
        //echo "Usersettings: " . ($endtime - $starttime) . "\n";

        if($test_mode){
            $flights = $this->getTestFlights($numberOfFlights);
        } else{
            $starttime = microtime(true);
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flights = $adapter -> getDepartedFlights($homeAirport, $numberOfFlights);
            //echo "Fligtaware: " . (microtime(true) - $starttime) . "\n";
        }

        $starttime = microtime(true);
        $cityDescriptions = $this->getWikiTexts($flights);
        $endtime = microtime(true);
        //echo "Wikipedia: " . ($endtime-$starttime) . "\n";
        $starttime = microtime(true);
        $cityPictures = $this->getListViewCityPictures($flights);
        $endtime = microtime(true);
        //echo "Flickr: " . ($endtime-$starttime) . "\n";

        $starttime = microtime(true);
        $openWeatherJSONAdapter = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
        $weather = array();
        foreach ($flights as $flight){
            $weather[$flight -> getDestination() -> getLocation()] = $openWeatherJSONAdapter ->getWeather($flight -> getDestination() -> getGpsCoordinates());
        }
        $endtime = microtime(true);
        //echo "OpenWeather: " . ($endtime-$starttime) . "\n";

        $data = array(
            'flights' => $flights,
            'cityDescriptions' => $cityDescriptions,
            'cityPictures' => $cityPictures,
            'weather' => $weather,
            'refreshTime' => $userSettings -> refresh_time,
        );
        return view('flightListView', $data);

    }

    /**
     * Controller for a specific Flight(ident). Returns a view with informations about the flight: Description, RouteMap, Weather, FlightInformation
     * @param $ident
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function flight($ident){
        $userSettings = UserSetting::where('user_id', '=', Auth::user()->id) -> first();
        if(!isset($userSettings)){
            echo 'No User Settings found';
        }

        if($userSettings -> test_mode){
            $flight = $this->getTestFlight();
        } else {
            $starttime = microtime(true);
            $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
            $flight = $adapter ->getFlight($ident);
            //echo "flightAware: " . (microtime(true)-$starttime) . "\n";
        }

        $starttime = microtime(true);
        $flickerAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);
        $planePicture = $flickerAdapter ->getSmallPictures($flight -> getAircraft(), 1);
        //echo "Flickr: " . (microtime(true) - $starttime) . "\n";

        $starttime = microtime(true);
        $cityDescription = $this->getWikiTexts([$flight]);
        $cityDescription = $cityDescription[$flight->getDestination()->getLocation()];
        $cityPictures = $this->getDetailViewCityPictures($flight);
        //echo "Wikipedia: " . (microtime(true) - $starttime) . "\n";

        $starttime=microtime(true);
        $openWeatherJSONAdapter = new OpenWeatherJsonAdapter(OPENWEATHER_API_KEY);
        $weather = $openWeatherJSONAdapter ->getWeather($flight -> getDestination() -> getGpsCoordinates());
        //echo "OpenWeather" . (microtime(true) - $starttime) . "\n";

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

    /**
     * Get Wikipedia descriptions for the destinations of different flights.  Array: ['Location' => 'description']
     * @param array $flights
     * @return array
     */
    private function getWikiTexts(array $flights): array
    {
        $wikipediaAdapter = new WikipediaJsonAdapter();
        foreach ($flights as $flight) {
            $cities[] = $flight->getDestination()->getLocation();
        }
        $cityDescriptions = $wikipediaAdapter->getDescriptions($cities);
        return $cityDescriptions;
    }

    /**
     * Get an array of Flickr-Pictures for different flights. For each flight one picture. Array: ['Location' => 'pictureLink']
     * @param array $flights
     * @return array
     */
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

    /**
     * Get an array of Pictures for one flight.
     * @param Flight $flight
     * @return array
     */
    private function getDetailViewCityPictures(Flight $flight): array
    {
        $flickJsonAdapter = new FlickrJsonAdapter(FLICKR_API_KEY);

        $city = $flight->getDestination()->getLocation();
        $cityPictures = $flickJsonAdapter->getFullPictures($city, 8);

        return $cityPictures;
    }

    /**
     * Get one flight. The Flightaware API-Key is not needed.
     * @return Flight
     */
    private function getTestFlight()
    {
        $gpsCoordinates = new GPSCoordinates(47.5611006, 7.590549, 10364);
        $airport = new Airport('BSL', 'Basel', 'Basel', $gpsCoordinates);
        $flight = new Flight('BSL1337', 'Swiss International', $airport, $airport, "A380", $gpsCoordinates, 0, 0, 1000,[]);
        return $flight;

    }

    /**
     * Get an array of flights. The Flightaware API-Key is not needed.
     * @param $number_of_flights
     * @return array
     */
    private function getTestFlights($number_of_flights) : array
    {
        $flights = array();
        for ($i = 0; $i < $number_of_flights; $i++) {
            $flights[] = $this->getTestFlight();
        }

        return $flights;
    }
}
