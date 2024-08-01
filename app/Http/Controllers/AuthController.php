<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginrequest;
use Illuminate\support\Facades\Auth;

class AuthController extends Controller
{

   public function Login(){
    return view('login');
    }
    public function Dologin(loginrequest $request){
        $credentials = $request->validated();

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('create'));
        }
        return to_route('login')->withErrors([
            'email'=>"email or password invalide"
        ])->onlyInput('email');

    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }

}
