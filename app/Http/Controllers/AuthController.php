<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('features.dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('username', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard.index')->with('success', 'Login Success');
        } else {
            return redirect()->back()->with('danger', 'Invalid Username or Password !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Logout Success');
    }
}
