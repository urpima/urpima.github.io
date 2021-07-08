<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\user;
use App\Publication;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Amenity;
class publicationController extends Controller
{
    public function index()
    {
        //$settings = Setting::pluck('value', 'key');
        $users = user::all();
        $publications = Publication::with('user')
            ->orderBy('titre', 'asc')
            ->get()
            ->groupBy('typedocument');
        $venues = Venue::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();

        return view('publication', compact( 'users', 'publications', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities'));
    }
}
