<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function showLogin()
    {

        return view('login');
    }

    public function showRegister()
    {

        return view('register');
    }

    public function Register(Request $request)
    {

        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100',
            'email'     => 'required|email:rfc,dns|unique:users,email',
            'password'   => 'required|string|min:8|confirmed', // needs password_confirmation
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => strtolower($validated['email']),
            'password' => $validated['password']
        ]);

        return redirect()->route('login.view')->with('sucess', 'Successfully registered your account');
    }



    public function login(Request $request)
    {

        //  validate

        $validated = $request->validate([
            'email' => 'required',
            'password' =>  'required'
        ]);

        if (Auth::attempt($validated)) {

            $request->session()->regenerate();
            return redirect()->route('home.view');
        }

        return back()->with('error', 'invalid username or password');
    }

    public function Logout(){

        Auth::logout();

        session()->flash('success','You logout! successfully');
        return redirect()->route('login.view');
    }
}
