<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\lib;

class FlightController extends Controller
{
    public function flightList(){
        $adapter = new FlightAwareJsonAdapter(FLIGHT_AWARE_NAME, FLIGHT_AWARE_KEY);
        $flight = $adapter ->getFlight($identCode);
        //$flight = $this->getTestFlight();
        $cityDescription = $this->getWikiText($flight);
        $cityPictures = $this->getDetailViewCityPictures($flight);

        $this->view('flight/flightdetailview', ['flight' => $flight, 'cityDescription' => $cityDescription, 'cityPictures' => $cityPictures]);
        return view('flightListView', []);

    }

    public function flight($ident){


        return view('flightDetailView', [$ident]);
    }
}
