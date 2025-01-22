<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin'){
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('info', 'Username or password is incorrect!');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProccess(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'address' => 'required',
            'telephone' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['level'] = 'user';
        User::create($validatedData);
        return redirect('/login')->with('info', 'Registration successfully. Pleas login by your account!');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        return redirect('/login');
    }
}
