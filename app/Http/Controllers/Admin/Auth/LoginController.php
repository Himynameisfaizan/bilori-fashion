<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate only required fields
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login (default guard)
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('admin.dashboard');
        // }

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
    return redirect()->route('admin.dashboard');
}

        // If login fails
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    // Logout
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('admin.login');
    // }


    public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}

    }
