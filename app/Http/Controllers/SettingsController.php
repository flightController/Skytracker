<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\UserSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class SettingsController extends Controller
{
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
        $data = array(
            'users' => $this->getUsers()
        );

        return view('userSelection', $data);
    }

    public function show($userId)
    {
        $data = $this->getDataToDisplay($userId);
        return view('settings', $data);
    }

    public function select(Request $request){
        $userId = $request->select_user;
        return redirect() -> route('userSettings', ['userId' => $userId]);
    }

    public function store(Request $request, $userId)
    {
        $this->validate($request, [
            'number_of_flights' => 'numeric',
            'refresh_time' => 'numeric',
            'home_airport' => 'alpha_num',
            'test_mode' => 'boolean',
            'email' => 'email|max:255|unique:users',
            'name' => 'max:255',
            'password' => 'min:6|confirmed',
        ]);

        $userSettings = UserSetting::where('user_id', '=', $userId) -> first();
        $user = User::where('id', '=', $userId) -> first();
        $userSettings->number_of_flights = $request->number_of_flights ?: $userSettings->number_of_flights;
        $userSettings->refresh_time = $request->refresh_time ?: $userSettings->refresh_time;
        $userSettings->home_airport = $request->home_airport ?: $userSettings->home_airport;
        if(!empty($request->test_mode)){
            $userSettings->test_mode = $request->test_mode;
        }
        try{
            $userSettings->save();
        }catch (Exception $e){
            echo "Es ist ein Fehler aufgetreten. Bitte laden Sie die Seite erneut.";
        }


        $user->email = $request->email ?: $user->email;
        $user->name = $request->name ?: $user->name;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $data = $this->getDataToDisplay($userId);
        $data['success'] = 'Einstellungen wurden erfolgreich gespeichert.';
        return view('settings', $data);
    }

    private function getDataToDisplay($userId)
    {
        $userSettings = UserSetting::where('user_id', '=', $userId)->first();
        $user = User::where('id', '=', $userId)->first();
        $data = array(
            'userName' => $user->name,
            'userEmail' => $user->email,
            'numberOfFlights' => $userSettings->number_of_flights,
            'refreshTime' => $userSettings->refresh_time,
            'homeAirport' => $userSettings->home_airport,
            'testMode' => $userSettings->test_mode,
        );
        return $data;
    }

    private function getUsers()
    {
        $users = DB::table('users')->select('id', 'name')->get();
        return $users;
    }
}
