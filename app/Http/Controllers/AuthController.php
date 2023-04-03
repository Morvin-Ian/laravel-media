<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function index()
    {
        return view('users.index');
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
            'id'=>$uuid,
            'username'=>['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']

        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);
        auth()->login($user);

        return redirect('/')->with('message', "Logged In");
    }

    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']

        ]);

        if(!Auth::validate($credentials)):
            dd("Invalid");
            return redirect('sign-in')
                ->with('message', 'auth failed');
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        
        dd("valid");


        Auth::login($user);

        return redirect('/')
            ->with('message', "Logged in");
        //     return redirect('/')->with('message', "Logged in");
        // }
        // return redirect('/sign-in')->with('message', "Invalid Credentials");
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
       
    }

    
}
