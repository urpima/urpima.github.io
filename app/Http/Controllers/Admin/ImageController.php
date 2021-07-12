<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Redirect, Response, File;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $galleries = Image::all();
        $data['images']=Image::all();
        return view("admin.gallery.gallery",$data, compact('galleries'));
//        return view("gallery");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,gif,png|max:8000'
        ]);

        $images=array();
        if($files=$request->file('images')){
            //if file present
            foreach($files as $file){
//                $name=$file->getClientOriginalName();
                $name = time().'.'.$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
                Image::insert( ['image'=> $name]);
            }
        }
       // return redirect()->route('admin.gallery');
        return back()->with('success', 'Successfully Save Your Image file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $gallery)
    {
       // abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gallery->delete();

        return back()->withSuccess('Task Created Successfully!');
    }

    public function massDestroy(MassDestroyGallery2Request $request)
    {
        Image::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
