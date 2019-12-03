<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use \App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $data= request()->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);         

        $imagePath = request('image')->store('photos', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,400);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $request->get('caption'),
            'image' => $imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post)
    { 
        return view('posts.show',compact('post'));
    }
}
