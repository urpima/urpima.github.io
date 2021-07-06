<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Speaker;
use App\User;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Amenity;

class TeamController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $users = User::all();

        return view('Team', compact('users'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');
        
        return view('speaker', compact('settings', 'speaker'));
    }
}
