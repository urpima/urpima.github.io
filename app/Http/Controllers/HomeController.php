<?php

namespace App\Http\Controllers;

use Response;
use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storoage;
class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $venues = Venue::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();

        return view('master', compact('settings', 'speakers', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');
        
        return view('speaker', compact('settings', 'speaker'));
    }
    public function download(Request $request ,$file){  
    
      return response()->download(public_path('images/'.$file));           
    }
}
