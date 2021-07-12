<?php

namespace App\Http\Controllers;

use App\Hotel;

class galleryController extends Controller
{
    public function index()
    {
        //$settings = Setting::pluck('value', 'key');
        $hotels = Hotel::all();
        
        return view('gallery', compact('hotels'));
    }

}
