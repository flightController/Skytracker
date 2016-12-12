<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;

class FlightController extends Controller
{
    public function flightList(){
        return view('flightListView', []);

    }

    public function flight($ident){
        return view('flightDetailView', [$ident]);

    }
}
