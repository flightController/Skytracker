<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserSetting extends Model
{
    protected $fillable = [
        'user_id', 'home_airport', 'number_of_flights', 'refresh_time', 'test_mode',
    ];
    
}
