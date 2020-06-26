<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function register_view()
    {
        return view('auth.registerview');
    }
    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
        
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return back();

    }
}
