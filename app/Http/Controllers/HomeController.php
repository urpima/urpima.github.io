<?php

namespace App\Http\Controllers;

use Response;
use App\Speaker;
use App\Hotel;
use App\Gallery;
use App\User;
use App\Publication;
use App\Projet;
use App\Sponsor;
use App\Auteurpublication;
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
        
        $sponsors = Sponsor::all();
        
        return view('speaker', compact('speaker', 'sponsors'));
    }
    public function view2(User $user)
    {
       // $settings = Setting::pluck('value', 'key');
        $publications = Publication::all();
        $projets = Projet::all();
        $auteurpublications = Auteurpublication::with('publication','user')
        ->orderBy('chercheur_id', 'asc')
            ->get()
            ->groupBy('publication_id');
        
        return view('user', compact('auteurpublications','publications', 'user','projets'));
    }
    public function download(Request $request ,$file){  
    
      return response()->download(public_path('images/'.$file));           
    }
    
}
