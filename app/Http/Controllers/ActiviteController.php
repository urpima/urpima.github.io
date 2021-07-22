<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Setting;
use App\Speaker;
use App\Hotel;
use App\Gallery;
use App\User;
use App\Axe;
use App\Sponsor;
use App\Publication;
use App\Auteurpublication;
use Illuminate\Support\Facades\Storoage;

class ActiviteController extends Controller
{
    public function index()
    {
        $auteurpublications = Auteurpublication::with('publication','user')
        ->orderBy('chercheur_id', 'asc')
            ->get()
            ->groupBy('publication_id');
        $publications = Publication::all();
        $users = User::all();
        $axes = Axe::with('user')
            ->get();
        $speakers = Speaker::with('axe')
        ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');

        return view('Activite', compact('auteurpublications','axes','users', 'publications','speakers'));
    }
    
}
