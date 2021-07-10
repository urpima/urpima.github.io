<?php
namespace App\Http\Controllers;

use App\Publication;
use App\Projet;
use App\User;
use App\Speaker;
use Illuminate\Http\Request;  
use Spatie\Searchable\Search;

class TestController extends Controller
{
    public function index()
    {
      return view('welcome');
    }

    public function search(Request $request)
    {
       $searchResults = (new Search())
            ->registerModel(Publication::class, 'titre')
            ->registerModel(Projet::class, 'titre')
            ->registerModel(User::class, 'name')
            ->registerModel(Speaker::class, 'name')
            ->perform($request->input('query'));

        return view('search', compact('searchResults'));
    }
}
