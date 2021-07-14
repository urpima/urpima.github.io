<?php

namespace App\Http\Controllers;

use Response;
use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Hotel;
use App\Gallery;
use App\User;
use App\Publication;
use App\Projet;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storoage;
class HomeController extends Controller
{
    public function index()
    {
       // $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
       // $faqs = Faq::all();
       // $prices = Price::with('amenities')->get();
       // $amenities = Amenity::with('prices')->get();

        return view('master', compact( 'speakers', 'schedules', 'hotels', 'galleries', 'sponsors'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');
        $sponsors = Sponsor::all();
        
        return view('speaker', compact('settings', 'speaker', 'sponsors'));
    }
    public function view2(User $user)
    {
       // $settings = Setting::pluck('value', 'key');
        $publications = Publication::all();
        $projets = Projet::all();
        
        return view('user', compact('publications', 'user','projets'));
    }
    public function download(Request $request ,$file){  
    
      return response()->download(public_path('images/'.$file));           
    }
    
}
