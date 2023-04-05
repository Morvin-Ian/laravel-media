<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create_post()
    {

        return view('posts.create_post');

    }

    public function post(Request $request)
    {
        
        
    }
}
