<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery2;
class GalleryController extends Controller
{
    public function gallerycreate(){
        return view('admin.gallery.gallerycreate');
    }
    public function galleryStore(Request $request){
     $this->validate($request, [
         'name' => 'required',
         'cover' => 'required'
     ]);
     $gallery = new Gallery2;

     $gallery->title = $request->title;
     
    }
}
