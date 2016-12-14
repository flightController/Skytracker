<?php

namespace App\Http\Controllers;

use App\lib\FlightAwareJsonAdapter;
use App\lib\WikipediaJsonAdapter;
use Illuminate\Http\Request;
use App\Flight;
use App\lib\FlickrJsonAdapter;
use App\Airport;

class FlightController extends Controller
{
    public function flightList(){
        //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
        //$flights = $adapter -> getDepartedFlights('LSZH', 5);
        $flights = $this->getTestFlights();
        $cityDescriptions = $this->getWikiTexts($flights);
        $cityPictures = $this->getListViewCityPictures($flights);

        $data = array(
            'flights' => $flights,
            'cityDescriptions' => $cityDescriptions,
            'cityPictures' => $cityPictures,
        );
        return view('flightListView', $data);

    }

    public function flight($ident){
        //$adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
        //$flight = $adapter ->getFlight($identCode);
        $flight = $this->getTestFlight();
        $cityDescription = $this->getWikiText($flight);
        $cityPictures = $this->getDetailViewCityPictures($flight);

        $data = array(
            'flight' => $flight,
            'cityDescription' => $cityDescription,
            'cityPictures' => $cityPictures,
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
        $cityPictures = array();

        $city = $flight->getDestination()->getLocation();
        $cityPicture = $flickJsonAdapter->getFullPictures($city, 8);
        $cityPicture[$city] = $cityPicture;

        return $cityPictures;
    }

    private function getTestFlight()
    {
        $airport = new Airport('BSL', 'Basel', 'Basel');
        $flight = new Flight('BSL1337', 'swiss', $airport, $airport, "", null);
        return $flight;

    }

    private function getTestFlights()
    {
        $flights = array();
        for ($i = 0; $i < 5; $i++) {
            $flights[] = $this->getTestFlight();
        }

        return $flights;
    }
}
