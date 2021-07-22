<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Speaker;
use App\Hotel;
use App\Gallery;
use App\Sponsor;

class seminController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();

        return view('semin', compact('settings', 'speakers','hotels', 'galleries', 'sponsors'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');
        
        return view('speaker', compact('settings', 'speaker'));
    }
}
