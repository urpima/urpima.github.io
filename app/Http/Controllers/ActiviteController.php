<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\User;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Amenity;
use Illuminate\Support\Facades\Storoage;
class ActiviteController extends Controller
{
    public function index()
    {
        $speakers = Speaker::with('axe')
        ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
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

        return view('Activite', compact('speakers', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities'));
    }
}
