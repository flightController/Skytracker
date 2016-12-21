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

    public function store(Request $request)
    {
        $userSettings = UserSetting::where('user_id', '=', Auth::user()->id) -> first();
        $userSettings -> number_of_flights = $request -> number_of_flight ?: $userSettings -> number_of_flights;
        $userSettings -> refresh_time = $request -> refresh_time ?: $userSettings -> refresh_time;
        $userSettings -> home_airport = $request -> home_airport ?: $userSettings -> home_airport;
        $userSettings -> test_mode =  $request ->  test_mode ?: $userSettings -> test_mode;
        $userSettings -> save();

        Auth::user() -> email = $request -> email ?: Auth::user() -> email;
        Auth::user() -> name = $request -> name ?: Auth::user() -> name;
        Auth::user() -> password = $request -> password ?: Auth::user() -> password;
        Auth::user() -> save();
    }
}
