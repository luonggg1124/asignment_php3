<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            return redirect()->route('pages.index');
        }else{
            return redirect()->back()->withErrors('email', 'Invalid credentials');
        }
    }

    public function register(RegisterRequest $request){
        $safe = $request->safe()->only(['name','email','password']);
        $user = User::create($safe);
        Auth::login($user);
        return redirect('/');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
