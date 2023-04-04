<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class AuthController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function profile(Request $request)
    {           
        $user_profile = User::where('uuid', $request->uuid)->get()[0];
        $authenticated_user = auth()->user();

        if(auth()->check())
        {
       
            $context_array = [
                'profile_owner'=> $user_profile,
                'user'=>$authenticated_user,
                'uuid'=>$request->uuid
            ];

            return view('users.profile',$context_array);
        }

        return redirect('/sign-in');
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
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']

        ]);


        $fields['password'] = bcrypt($fields['password']);


        $user = User::create($fields);
        $user->uuid = $uuid;
        $user->save();
        auth()->login($user);

        return redirect('/')->with('message', "Logged In");
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
            return redirect('/')
                ->with('message', "Logged in");
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

    
}
