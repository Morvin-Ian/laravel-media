<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create_post()
    {
        if(auth()->check())
        {

            return view('posts.create_post');
        }

        return redirect('sign-in');
    }

    public function post(Request $request)
    {        
        $fields = $request->validate([
            'caption'=>'sometimes|min:5',
            'image'=>'sometimes'
        ]);


        if ($request->hasFile('image'))
        {
            $fields['image'] =  $request->file('image')->store('posts','public');
            
        }

        $fields['user_id'] =  auth()->user()->id;

        Post::create($fields);
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $post = Post::where('id', $request->id)->get()[0];
        $post->delete();
        return redirect('/');
        
    }
}
