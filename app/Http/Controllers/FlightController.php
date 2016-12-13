<?php

namespace App\Http\Controllers;

use App\lib\FlightAwareJsonAdapter;
use App\lib\WikipediaJsonAdapter;
use Illuminate\Http\Request;
use App\Flight;
use App\lib\FlickrJsonAdapter;

class FlightController extends Controller
{
    public function flightList(){
        $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
        $flights = $adapter -> getDepartedFlights('LSZH', 5);
        //$flights = $this->getTestFlights();
        //$cityDescriptions = $this->getWikiTexts($flights);
        //$cityPictures = $this->getListViewCityPictures($flights);

        //$this->view('flight/flightdetailview', ['flight' => $flight, 'cityDescription' => $cityDescription, 'cityPictures' => $cityPictures]);

        $data = array(
            'flights' => $flights,
        );
        return view('flightListView', $data);

    }

    public function flight($ident){
        $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
        $flight = $adapter ->getFlight($identCode);
        //$flight = $this->getTestFlight();
        //$cityDescription = $this->getWikiText($flight);
        //$cityPictures = $this->getDetailViewCityPictures($flight);

        //$this->view('flight/flightdetailview', ['flight' => $flight, 'cityDescription' => $cityDescription, 'cityPictures' => $cityPictures]);

        return view('flightDetailView', ['flight', $flight]);
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
            $cityPictures[$city] = $cityPicture[0] ? $cityPicture[0] : "";
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
}
