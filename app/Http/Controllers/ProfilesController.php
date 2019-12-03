<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Post;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user)
    {
        User::findOrFail($user);
        
        //return view('profiles.index',['user'=> $user]); 
        //$posts = Post::class;
        //$post = $posts->last();
        $posts = User::find($user)->posts;
        return view('profiles.index',['user'=> $user], compact('posts'));
    } 
}