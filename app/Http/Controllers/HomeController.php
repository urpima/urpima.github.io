<?php

namespace App\Http\Controllers;

use Response;
use App\Speaker;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storoage;
class HomeController extends Controller
{
    public function index()
    {
       
        $speakers = Speaker::all();
      
       
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
      

        return view('master', compact( 'speakers',  'hotels', 'galleries', 'sponsors'));
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
