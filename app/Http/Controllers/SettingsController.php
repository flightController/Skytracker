<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSetting;

class HomeController extends Controller
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
        $data = array([
            'userSettings' => UserSetting::where('user_id', '=', Auth::user()->id) -> first(),
        ]);
        return view('Settings', $data);
    }
}
