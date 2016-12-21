<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSetting;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userSettings = UserSetting::where('user_id', '=', Auth::user()->id) -> first();
        $data = array([
            'userName' => Auth::user() -> name,
            'userEmail' => Auth::user() -> email,
            'numberOfFlights' => $userSettings -> number_of_flights,
            'refreshTime' => $userSettings -> refresh_time,
            'homeAirport' => $userSettings -> home_airport,
            'testMode' => $userSettings -> test_mode,
        ]);

        return view('settings', $data);
    }
}
