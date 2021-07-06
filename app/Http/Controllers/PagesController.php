<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PagesController extends Controller
{
    public function posts()
    {
        $posts = Post::all();
        return view('content.posts', compact('posts'));
    }
    
    public function post(Post $post)
    {
        //$post = DB::table('posts')->find($id);
        return view('content.post', compact('post'));
    }
    public function store(Request $request)
    {
        /*troisieme :
        Post::create(request()->all());
        */
        
        /* dexieme methode :
        Post::create([
          'title'  => request('title'),
         'body'   => request('body'),
         'url'   => request('url')
        ]);

        */


        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'url' => 'image|mimes:jpg,jpeg,gif,png|max:2048'
        ]);
        /* Premierm methode d ajout :*/
        
        $img_name = time() . '.' . $request->url->getClientOriginalExtension();

        $post = new Post;

        $post->title = request('title');

        $post->body = request('body');

        $post->url = $img_name;


        $post->save();
        $request->url->move(public_path('upload'), $img_name);

       

        return redirect('/posts');
    }

    public function category($name)
    {
        $cat = DB::table('categories')->where('name' , $name)->value('id');

        $posts = DB::table('posts')->where('category_id' , $cat)->get();

        return view('content.category', compact('posts'));
    }
    
}
