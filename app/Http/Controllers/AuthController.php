<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class AuthController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();  

        $assoc_array = [
            'posts'=>$posts
        ];

        return view('users.index', $assoc_array);
    }


    public function sign_in()
    {
        return view('users.auth.sign_in');
    }

    public function sign_up()
    {
        return view('users.auth.sign_up');
    }

    public function register(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $fields = $request->validate([
            'username'=>['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']

        ]);


        $fields['password'] = bcrypt($fields['password']);


        $user = User::create($fields);
        $user->uuid = $uuid;
        $user->save();
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|string|email',
            'password' => 'required|string',
        ]);


        $credentials = $request->only('email', 'password');

        $user = auth()->attempt($credentials);

        if($user)
        {
            $request->session()->regenerate();
            return redirect('/');
        }


        return redirect('/sign-in')
                ->with('message', "Unauthorized");  
   
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
       
    }

    public function profile(Request $request)
    {           
       
        if(auth()->check())
        {
            $user_profile = User::where('uuid', $request->uuid)->get()[0];
            $authenticated_user = auth()->user();

            $context_array = [
                'profile_owner'=> $user_profile,
                'user'=>$authenticated_user,
                'uuid'=>$request->uuid
            ];

            return view('users.profile',$context_array);
        }

        return redirect('/sign-in');
    }

    public function profile_update(Request $request)
    {           
        $user = auth()->user();

        $fields = $request->validate([
      
            'username'=> 'required',
            'profile'=> 'sometimes',
            'email'=> 'sometimes|email'


        ]);


        if($request->hasFile('profile'))
        {
            $fields['profile'] = $request->file('profile')->store('profiles', 'public');
            $user->profile = $fields['profile'];
        }

        $user->username = $fields['username'];
        $user->email = $fields['email'];
        $user->save();    

        return redirect("/profile/$request->uuid");

    }


    
}
